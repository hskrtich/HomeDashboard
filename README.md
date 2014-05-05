# homedashboard

This is my home dashboard.

## Known nestgraph Issues

* Only checks for heating on/off, not cooling (I don't have cooling)
* Only supports a single Nest thermostat (I only have one)
* Heating on/off trendline lazily mapped on to the temperature graph
* Assumes you want temperatures displayed in Fahrenheit
* Doesn't automatically redraw when you resize the browser window
* Labels (current/target/heating) don't follow the trend lines when you pan/zoom
* Need to figure out what's actually wrong with the authentication caching in ```nest-api``` instead of just purging its files in ```/tmp```

