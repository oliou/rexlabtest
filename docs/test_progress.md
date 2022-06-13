

# QUESTIONS:

- "sync sections, topics, messages, and users in from external sources" + using a REST API  + "copies any detected changes back into the main database" + "many data sources coming in soon":
    - Unidirectional sync from many externals to main?
        - This is a database consolidation scenario with local changes:
            - The main DB is the sum of all external DBs + local changes from the application
    - The external DBs never contain anything else than their own data
 
- How are the external sources fed/created? 
    - Why is there several external sources?
    - Is there several instances of the forum running independently from each others? (Like on different AWS regions/AZs?)
    - If that is the case, are they all reading data from a single source (The main DB) but only writing into their own instance?  (unidirectional sync...)
    And how does the login work? If a user was created into the main instance of the app attached to the main DB, can he log into another instance that would be using an "external" db?
    
    Assuming it is the case:
        - A user logs in an external instance of the app and creates a new section +topic +message
            - those data are created locally and don't exist yet in the main DB
            - they may refer to a user not existing locally
        - A user logs in an instance of the app and send a message on an existing topic that does not exist locally:
            - the message saved in the local instance will refer to a topic that does not exist locally
         

- Does duplicated data can existing in main/external DB before sync happens? 