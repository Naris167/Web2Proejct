# Define the items and their lowest prices in USD
items_prices_usd = {
    "Big Mac": 4.39,
    "Quarter Pounder with Cheese": 4.29,
    "Double Quarter Pounder with Cheese": 5.79,
    "Cheeseburger": 1.49,
    "Double Cheeseburger": 2.19,
    "Hamburger": 1.29,
    "McDouble": 1.99,
    "McChicken": 1.79,
    "Filet-O-Fish": 4.39,
    "Spicy McChicken": 1.79,
    "4-piece Chicken McNuggets": 2.19,
    "6-piece Chicken McNuggets": 3.19,
    "10-piece Chicken McNuggets": 4.49,
    "20-piece Chicken McNuggets": 5.89,
    "Deluxe Spicy Crispy Chicken Sandwich": 5.99,
    "Small Fries": 1.79,
    "Medium Fries": 2.39,
    "Large Fries": 2.89,
    "Apple Slices": 1.00,
    "Side Salad": 2.49,
    "Caesar Salad with Grilled Chicken": 4.99,
    "Caesar Salad with Crispy Chicken": 4.99,
    "Egg McMuffin": 3.99,
    "Sausage McMuffin with Egg": 3.49,
    "Bacon, Egg & Cheese Biscuit": 3.79,
    "Sausage Biscuit with Egg": 3.29,
    "Sausage McGriddles": 3.29,
    "Bacon, Egg & Cheese McGriddles": 3.99,
    "Hotcakes": 2.99,
    "Hash Browns": 1.29,
    "Fruit and Maple Oatmeal": 2.59,
    "Cheeseburger Happy Meal": 3.49,
    "Chicken McNuggets Happy Meal (4-piece)": 3.49,
    "Hamburger Happy Meal": 3.49,
    "Apple Pie": 0.99,
    "Chocolate Chip Cookie": 0.99,
    "McFlurry": 2.39,
    "Sundaes": 1.49,
    "Vanilla Cone": 1.00,
    "Hot Fudge Sundae": 1.49,
    "Strawberry & Cream Pie": 1.19,
    "Soft Drinks (Small)": 1.00,
    "Soft Drinks (Medium)": 1.29,
    "Soft Drinks (Large)": 1.39,
    "Sweet/Unsweetened Iced Tea": 1.00,
    "Coffee (Hot or Iced)": 1.29,
    "Lattes (Small)": 2.29,
    "Smoothies": 2.49,
    "Shakes": 2.19,
    "Orange Juice": 1.59,
    "Milk": 1.00,
    "Frappés": 2.49,
    "Espresso Drinks": 2.29,
    "McRib": 3.69,
    "Shamrock Shake": 2.19,
    "Pumpkin Spice Latte": 2.29
}

# Conversion rate from USD to THB
usd_to_thb = 32.5

# Convert all prices from USD to THB
items_prices_thb = {item: round(price * usd_to_thb, 2) for item, price in items_prices_usd.items()}

# Display the result
# import ace_tools as tools; tools.display_dataframe_to_user(name="McDonald's Menu Prices in THB", dataframe=items_prices_thb)

import pandas as pd

# Convert the dictionary to a DataFrame
items_prices_thb_df = pd.DataFrame(list(items_prices_thb.items()), columns=["Item", "Price (THB)"])
print(items_prices_thb_df)
# Display the DataFrame to the user
# tools.display_dataframe_to_user(name="McDonald's Menu Prices in THB", dataframe=items_prices_thb_df)
