
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

- rfid_point
    - card_id --> [ varchar(20) ]

