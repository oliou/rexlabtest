

# QUESTIONS:

- "sync sections, topics, messages, and users in from external sources" + using a REST API  + "copies any detected changes back into the main database" + "many data sources coming in soon":
    - Unidirectional sync from many externals to main?
        - This is a database consolidation scenario with local changes:
            - The main DB is the sum of all external DBs + local changes from the main application (as implied by this statement: "database.sqlite is the main application database")
    - The external DBs never contain anything else than its own data (?)
 
- How are the external sources fed/created? 
    - Why is there several external sources?
    - Is there several instances of the forum running independently from each others? (Like on different AWS regions/AZs?) With one of them being the 'Main' application?  (in that case)
    - If that is the case, are they all reading data from a single source (The main DB) but only writing into their own instance?  (unidirectional sync...)
    - How does the login work? If a user was created into the main instance of the app attached to the main DB, can he log into another instance that would be using an "external" db?
    - About Section: can the main app and external apps have the same sections? Then do they have the same Id? Then if not, how to reconciliate in the main app topics that point to sections with the same title but different IDs? 
        - Should we assume the F/E will handle this case and be able to pull topics that technically relates to different sections but logically relates to the same on, only considering the title (Select all topics under a section with title= xxx)? (Potential referential integrity issues?)
        - Or should we consolidate the imported data under a single item, if it exists already in the main app (create it if it does not)?

- Case 1 : If the main instance can contribute to topics retrieved from external source and DB sync is unidirectional from external to main, then externals need another way to retrieve updates from main, otherwise topics would have different sets of messages depending where they are accessed from. 
    - Assumptions:
        - all the external apps can retrieve data from the main app on demand  (ex: when loading a topic created locally, the app still need to check if any new messages have been created/imported in the main app )
        - Users created in an external instances can log into this instance only before sync to main then into any instance after sync to main
        - all apps allow to contribute to any topic available locally or into the main app
    Use Case example:
        - A user logs in an external instance of the app and creates a new  topic  and message:
            - those data are created locally and don't exist yet in the main DB
            - they may refer to a user not existing locally (in the external instance) but in the main DB
        - A user logs in an instance of the app and send a message on an existing topic that does not exist locally:
            - the message saved in the local instance will refer to a topic that does not exist locally
         

