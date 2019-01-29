# Soccer game time chatbot app
Laravel 5.5.43 (PHP 7.0) / MySQL

Front-end Angular 6 repo: https://github.com/nothingtoocrazy/chatbot-frontend

---

### TODO:
- configure CORS

---

## Ideas
- For each game, display which network (fox/nbcsn/espn) is hosting the game and provide links to take you right to the game. Always have 'r/soccerstreams' as a fallback.
- This site does some similar things. For content inspiration (not design - the design is bad): https://www.livesoccertv.com/

## Schedule to sync data from football-data API to DB
- Leagues: once a year
- Teams: once a year
- Matches: daily at midnight
- Day-of matches: direct API call

## Action plan
- [X] Find APIs to get game times
- [X] Figure out what format we get data in and create database tables
- [X] Start Creating UI to display game times
- [X] Populate database with dummy data
- [X] Display dummy data from front end

- [ ] Flesh out team/league data in DB
- [ ] Start caching game time data in database
- [ ] Build out specific game time info, links, etc
- [ ] Add UI flexibility to restrict game info to specific teams/regions/leagues?
- [ ] Add cron job to collect game time info for database.
- [ ] Integrate basic chat bot functionality for specific game time questions
- [ ] User specific data stored? So each user has certain league games that show.
- [ ] Chat bot extra features?

## Long-term
We want to let the user enter a human-readable question. Interpret what they are asking, and collect the data and serve it back to them.

for Day of games:
Consider webhooks to update data when important events happen ( like game finished or Goals scored);

