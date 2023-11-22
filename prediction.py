from flask import Flask, request, jsonify
import pandas as pd
import numpy as np
from sklearn.linear_model import LogisticRegression
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
import mysql.connector

app = Flask(__name__)

coefficients_df = pd.read_csv('cholera_model.csv', index_col=0)

db_config = {
    'host': "localhost",
    'user': "root",
    'password': "",
    'database': "cholera"
}

def train_logistic_regression():
    data = pd.read_csv('cholera_dataset.csv')
    data = pd.get_dummies(data, columns=['WaterQuality', 'Sanitation', 'WeatherConditions'], drop_first=True)
    X = data.drop('CholeraOutbreak', axis=1)
    y = data['CholeraOutbreak']
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)
    model = LogisticRegression()
    model.fit(X_train, y_train)
    y_pred = model.predict(X_test)
    accuracy = accuracy_score(y_test, y_pred) * 100
    model_coefficients = model.coef_
    coefficients_df = pd.DataFrame(model_coefficients, columns=X.columns, index=['Current'])
    coefficients_df.to_csv('cholera_model.csv')
    return accuracy

def save_prediction_to_database(features, prediction):
    connection = mysql.connector.connect(**db_config)
    cursor = connection.cursor()
    insert_query = "INSERT INTO cholera_predictions (input_features, prediction) VALUES (%s, %s)"
    cursor.execute(insert_query, (str(features), prediction))
    connection.commit()
    cursor.close()
    connection.close()

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json()
    features = data['input_features']
    model_coefficients = coefficients_df.loc['Current'].values
    prediction = np.dot(features, model_coefficients)
    save_prediction_to_database(features, prediction)
    return jsonify({'prediction': prediction})

if __name__ == '__main__':
    train_logistic_regression()
    app.run(host='0.0.0.0', port=5000)
