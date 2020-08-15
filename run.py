import subprocess
import sys
import os
from time import sleep

def install():
    os.system('composer install')
    os.system('composer global require laravel/installer')
    subprocess.check_call([sys.executable, "-m", "pip", "install", "mysql-connector-python"])

def migrateandrun():
    import mysql.connector
    try:
        mydb = mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="information_schema",
        port=3306
        )

        if mydb.is_connected():
            print("connect success")
            cursor = mydb.cursor()
            cursor.execute("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'learnit_db';")
            record = cursor.fetchall()
            if len(record) == 0:
                print("Created Learnit Database (^w^)/")
                cursor.execute("CREATE DATABASE learnit_db")
                print("Success")
            else:
                print("Learnit Database Availabel (OwO)8")
            mydb.close()
    except :
        print("Nyalain mysql nya :3 di xampp, sama check apakah settingan mysql nya sudah bener atau enggak di python")
        print("kalo ada perubahan, silahkan ubah juga di .env.example :3 environment mysql nya, jangan ubah yang database nya ya")
    
def restorlaravel():
    sleep(1)
    print("restoring laravel :3")
    os.system("copy .env.example .env")
    os.system("php artisan key:generate")
    os.system("php artisan migrate:fresh --seed")
    print("success *(OwO)*")
    sleep(1)
    os.system("php artisan serve --port 8080")


def main():
    install()
    os.system("cls")
    migrateandrun()
    restorlaravel()

if __name__ == "__main__":
    main()