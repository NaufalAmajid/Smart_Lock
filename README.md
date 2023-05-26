
# Smasrt Lock

Preparing Database

DATABASE NAME = smartlock




## TABLE

- admins
    - id --> [ integer, primary_key, auto_increment ]
    - admin_id --> [ varchar(20) ]
    - telegram_id --> [ varchar(20) ]
    - name --> [ varchar(50) ]
    - username --> [ varchar(20) ]
    - password --> [ text ]

- users
    - id --> [ integer, primary_key, auto_increment ]
    - card_id --> [ varchar(20) ]
    - name --> [ varchar(50) ]
    - address --> [ text ]
    - admin_id --> [ varchar(20) ]

- rfid_point
    - card_id --> [ varchar(20) ]

- access_log
    - id --> [ integer, primary_key, auto_increment ]
    - card_id --> [ varchar(20) ]
    - enter --> [ datetime ]


