-- CREATE VIEW WeatherHeaderView AS
-- SELECT l.id as 'city_id',  l.city as 'city', wd.date as 'current_date', min(wh.temperature) as 'min_temperature', 
-- max(wh.temperature) as 'max_temperature'
-- FROM weatherday wd
-- JOIN location l ON wd.locationid = l.id
-- JOIN weatherhours wh ON wd.id = wh.weatherdayid
-- GROUP BY l.id,  l.city, wd.date


CREATE VIEW WeatherHoursView AS
SELECT l.id as 'city_id', l.city as 'city', wd.date as 'date', wh.temperature as 'temperature', 
wh.cloud as 'cloud', wh.precipitaion as 'precipitaion' 
FROM weatherhours wh
JOIN weatherday wd ON wh.weatherdayid = wd.id
JOIN location l ON wd.locationid = l.id