import pandas as pd
import numpy as np

np.random.seed(42)

num_records = 100

water_quality = ['Good', 'Poor']
sanitation = ['Adequate', 'Inadequate']
weather_conditions = ['Sunny', 'Rainy']

data = {
    'WaterQuality': np.random.choice(water_quality, num_records),
    'Sanitation': np.random.choice(sanitation, num_records),
    'WeatherConditions': np.random.choice(weather_conditions, num_records),
    'CholeraOutbreak': np.random.choice([0, 1], num_records)
}

df = pd.DataFrame(data)

df.to_csv('cholera_dataset.csv', index=False)
