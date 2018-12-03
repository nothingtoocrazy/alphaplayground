# Soccer game time chatbot app (IN DEVELOPMENT)
Laravel 5.5.43 (PHP 7.0) / MySQL

Front-end Angular 6 repo: https://github.com/nothingtoocrazy/chatbot-frontend

## Ideas
- For each game, display which network (fox/nbcsn/espn) is hosting the game and provide links to take you right to the game. Always have 'r/soccerstreams' as a fallback.
- This site does some similar things. For content inspiration (not design - the design is bad): https://www.livesoccertv.com/

## Schedule to sync data from football-data API to DB
- Leagues: once a year
- Teams: once a year
- Matches: twice a month
- Day-of matches: direct API call

## Action plan
### Sprint 1:
- [X] Find APIs to get game times
- [ ] Figure out what format we get data in and create database tables
- [ ] Start Creating UI to display game times

### Sprint 2:
- [ ] Populate database with dummy data
- [ ] Display dummy data from front end
- [ ] Start caching game time data in database
- [ ] Serve game data to front end

### Sprint 3:
- [ ] Build out specific game time info, links, etc
- [ ] Add UI flexibility to restrict game info to specific teams/regions/leagues?
- [ ] Add cron job to collect game time info for database.

### Sprint 4:
- [ ] Integrate basic chat bot functionality for specific game time questions
- [ ] User specific data stored? So each user has certain league games that show.
- [ ] Chat bot extra features?

## Long-term
We want to let the user enter a human-readable question. Interpret what they are asking, and collect the data and serve it back to them.
