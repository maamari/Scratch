import sqlite3
from sqlite3 import Error
import gspread
from oauth2client.service_account import ServiceAccountCredentials
import os
import json  
  
def get_from_sheet():
    sheet_name = "Untitled form (Responses)"
    scope = ["https://spreadsheets.google.com/feeds","https://www.googleapis.com/auth/drive",]
    creds_obj = ServiceAccountCredentials.from_json_keyfile_name('solar-spot-318717-c7a62df6191c.json', scope)
    client = gspread.authorize(creds_obj)
    sheet = client.open(sheet_name).sheet1
      
    return sheet.get_all_values()
  
def add_data_to_table(db, rows):
    conn = sqlite3.connect(db)
    cur = conn.cursor()
    cur.execute('CREATE TABLE IF NOT EXISTS query (id INTEGER PRIMARY KEY, timestamp TEXT UNIQUE, name TEXT, year TEXT)')
    conn.commit()

    c = conn.cursor()
    for row in rows[1:]:
        print(tuple(row))
        c.execute('INSERT OR IGNORE INTO query (timestamp, name, year) VALUES (?, ?, ?)', tuple(row))
    conn.commit()
    c.close()

if __name__ == '__main__':
    data = get_from_sheet()
    add_data_to_table('sheets.db', data)
