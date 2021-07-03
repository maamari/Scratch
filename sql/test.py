import sqlite3
import sheets 

class Database:

    def __init__(self, db):
        data = sheets.get_from_sheet()
        sheets.add_data_to_table(db, data)

        self.conn = sqlite3.connect(db)
        self.cur = self.conn.cursor()
        self.cur.execute('CREATE TABLE IF NOT EXISTS query (id INTEGER PRIMARY KEY, timestamp TEXT UNIQUE, name TEXT, year TEXT)')
        self.conn.commit()

    def insert(self, timestamp, name, year):
        self.cur.execute('INSERT OR IGNORE INTO query VALUES(NULL,?,?,?)',[timestamp, name, year])
        self.conn.commit()

    def view(self):
        self.cur.execute('SELECT * FROM query')
        rows = self.cur.fetchall()
        print(rows)
        return rows

    def search(self, timestamp='', name='', year=''):
        self.cur.execute('SELECT * FROM query WHERE timestamp = ? OR name = ? OR year = ?', (timestamp, name, year))
        rows = self.cur.fetchall()
        return rows

    def delete(self, id):
        self.cur.execute('DELETE FROM query WHERE id = ?', (id, ))
        self.conn.commit()

    def update(self, id, timestamp, name, year):
        self.cur.execute('UPDATE query SET timestamp = ?, name = ?, year = ?, WHERE id = ?', [timestamp, name, year, id])
        self.conn.commit()

    def __del__(self):
        self.conn.close()

from tkinter import *
from tkinter import messagebox

database = Database('sheets.db')

class Window(object):
    def __init__(self, window):
        self.window = window
        self.window.wm_title('SDAB Inventory')
        l1 = Label(window, text='timestamp', font=('Courier', 20))
        l1.grid(row=0, column=0, padx=10, pady=20)
        
        l2 = Label(window, text='name', font=('Courier', 20))
        l2.grid(row=0, column=2, padx=10, pady=20)
        
        l3 = Label(window, text='Type', font=('Courier', 20))
        l3.grid(row=1, column=0, padx=10)
        
        self.timestamp_text = StringVar()
        self.e1 = Entry(window, width=30, textvariable=self.timestamp_text,font=('Courier', 15))
        self.e1.grid(row=0, column=1)
        
        self.name_text = StringVar()
        self.e2 = Entry(window, width=30, textvariable=self.name_text,font=('Courier', 15))
        self.e2.grid(row=0, column=3)
        
        self.year_text = StringVar()
        self.e3 = Entry(window, width=30, textvariable=self.year_text,font=('Courier', 15))
        self.e3.grid(row=1, column=1)
        
        self.list1 = Listbox(window, width=50, font=('Courier', 15))
        self.list1.grid(row=2,column=0,rowspan=6,columnspan=3,padx=(20, 0),pady=(20, 0),)
        self.list1.bind('<<ListboxSelect>>', self.get_selected_row)
        self.list2 = Listbox()

        sb1 = Scrollbar(window, width=20)
        sb1.grid(row=2, column=3, rowspan=7, padx=(10, 0), sticky=W)
        self.list1.config(yscrollcommand=sb1.set)
        sb1.config(command=self.list1.yview)

        b1 = Button(window, text='View all', width=20,command=self.view_command, font=('Courier', 15))
        b1.grid(row=2, column=3, pady=(20, 0))

        b2 = Button(window, text='Search entry', width=20,command=self.search_command, font=('Courier', 15))
        b2.grid(row=3, column=3)

        b3 = Button(window, text='Add entry', width=20,command=self.add_command, font=('Courier', 15))
        b3.grid(row=4, column=3)

        b4 = Button(window, text='Update selected', width=20,command=self.update_command, font=('Courier', 15))
        b4.grid(row=5, column=3)

        b5 = Button(window, text='Delete selected', width=20,command=self.delete_command, font=('Courier', 15))
        b5.grid(row=6, column=3)

        b6 = Button(window, text='Close', width=20,command=window.destroy, font=('Courier', 15))
        b6.grid(row=7, column=3)

    def get_selected_row(self, event):  # the "event" parameter is needed b/c we've binded this function to the listbox
        try:
            index = self.list1.curselection()[0]
            self.selected_tuple = self.list1.get(index).split()
            self.e1.delete(0, END)
            self.e1.insert(END, self.selected_tuple[1])
            
            self.e2.delete(0, END)
            self.e2.insert(END, self.selected_tuple[2])

            self.e3.delete(0, END)
            self.e3.insert(END, self.selected_tuple[3])

            self.e4.delete(0, END)
            self.e4.insert(END, self.selected_tuple[4])
        
        except IndexError:
            pass  # in the case where the listbox is empty, the code will not execute

    def view_command(self):
        self.list1.delete(0, END)  # make sure we've cleared all entries in the listbox every time we press the View all button
        for row in database.view():
            formatted_row = \
                '{:2} {:10} {:10} {:10}'.format(row[0], row[1],row[2],row[3])
            self.list1.insert(END, formatted_row)
            self.list2.insert(END, row)

    def search_command(self):
        self.list1.delete(0, END)
        for row in database.search(self.timestamp_text.get(),
                                   self.name_text.get(),
                                   self.year_text.get()):
            self.list1.insert(END, row)

    def add_command(self):
        if (' ' in self.timestamp_text.get() or ' ' in self.name_text.get() or ' ' in self.year_text.get()):
            messagebox.showinfo('Error!','Please use underscores in place of spaces', icon='error')
            return
        database.insert(self.timestamp_text.get(), self.name_text.get(),self.year_text.get())
        self.list1.delete(0, END)
        self.list1.insert(END, (self.timestamp_text.get(),self.name_text.get(), self.year_text.get()))

    def delete_command(self):
        database.delete(self.selected_tuple[0])
        self.view_command()

    def update_command(self):
        database.update(self.selected_tuple[0], self.timestamp_text.get(), self.name_text.get(), self.year_text.get())
        self.view_command()


# code for the GUI (front end)
window = Tk()
window.geometry('1007x390')
window.resizable(False, False)
Window(window)
window.mainloop()

