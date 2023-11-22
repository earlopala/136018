import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LogisticRegression
from sklearn.metrics import classification_report
import warnings

num_records = 100
coefficients_list = []
warnings.filterwarnings("ignore", category=UserWarning)

for _ in range(num_records):
    np.random.seed(_)
    n_samples = 1000
    data = pd.DataFrame({
        'WaterQuality': np.random.choice(['Good', 'Poor'], n_samples),
        'Sanitation': np.random.choice(['Adequate', 'Inadequate'], n_samples),
        'WeatherConditions': np.random.choice(['Sunny', 'Rainy'], n_samples),
        'CholeraOutbreak': np.random.choice([0, 1], n_samples)
    })

    data = pd.get_dummies(data, columns=['WaterQuality', 'Sanitation', 'WeatherConditions'], drop_first=True)

    X = data.drop('CholeraOutbreak', axis=1)
    y = data['CholeraOutbreak']

    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

    model = LogisticRegression()
    model.fit(X_train, y_train)

    model_coefficients = model.coef_
    record_df = pd.DataFrame(model_coefficients, columns=X.columns, index=[f'Record_{_}'])
    coefficients_list.append(record_df)

    y_pred = model.predict(X_test)

    with warnings.catch_warnings():
        warnings.simplefilter("ignore")
        print("Classification Report:\n", classification_report(y_test, y_pred, zero_division=0))

coefficients_df = pd.concat(coefficients_list)
coefficients_df.to_csv('cholera_model.csv', index_label='Record_ID')
