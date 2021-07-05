import sqlite3
import sheets 
from time import gmtime, strftime
import webbrowser

class Database:

    def __init__(self, db):
        data = sheets.get_from_sheet()
        sheets.add_data_to_table(db, data)

        self.conn = sqlite3.connect(db)
        self.cur = self.conn.cursor()
        self.cur.execute('CREATE TABLE IF NOT EXISTS query (id INTEGER PRIMARY KEY, timestamp TEXT UNIQUE, contact TEXT, part_num TEXT, description TEXT, status TEXT, tagging TEXT, approval TEXT, system TEXT, location TEXT, quantity TEXT)')
        self.conn.commit()

    def insert(self, timestamp, contact, part_num, description, status, tagging, approval, system, location, quantity):
        self.cur.execute('INSERT OR IGNORE INTO query VALUES(NULL,?,?,?,?,?,?,?,?,?,?)',[timestamp, contact, part_num, description, status, tagging, approval, system, location, quantity])
        self.conn.commit()

    def view(self):
        self.cur.execute('SELECT * FROM query')
        rows = self.cur.fetchall()
        return rows

    def search(self, timestamp='', contact='', part_num='', description='', status='', tagging='', approval='', system='', location='', quantity=''):
        self.cur.execute('SELECT * FROM query WHERE timestamp = ? OR contact = ? OR part_num = ? OR description = ? OR status = ? OR tagging = ? OR approval = ? OR system = ? OR location = ? OR quantity = ?', (timestamp, contact, part_num, description, status, tagging, approval, system, location, quantity))
        rows = self.cur.fetchall()
        return rows

    def delete(self, id):
        self.cur.execute('DELETE FROM query WHERE id = ?', (id, ))
        self.conn.commit()

    def update(self, id, timestamp, contact, part_num, description, status, tagging, approval, system, location, quantity):
        self.cur.execute('UPDATE query SET timestamp = ?, contact = ?, part_num = ?, description = ?, status = ?, tagging = ?, approval = ?, system = ?, location = ?, quantity = ? WHERE id = ?', [timestamp, contact, part_num, description, status, tagging, approval, system, location, quantity, id])
        self.conn.commit()

    def __del__(self):
        self.conn.close()

from tkinter import *
from tkinter import messagebox
from tkinter import font

database = Database('sheets.db')

class Window(object):
    def __init__(self, window):
        self.window = window
        self.window.wm_title('SDAB Inventory')

        #===========================================================

        l2 = Label(window, text='Contact', font=('Courier', 20))
        l2.grid(row=0, column=0, padx=(23,0), pady=(20,0), sticky=W)
        
        l3 = Label(window, text='Part Number', font=('Courier', 20))
        l3.grid(row=1, column=0, padx=(23,0), sticky=W)
       
        l4 = Label(window, text='Description', font=('Courier', 20))
        l4.grid(row=2, column=0, padx=(23,0), sticky=W)

        l5 = Label(window, text='Status', font=('Courier', 20))
        l5.grid(row=0, column=2, padx=(10,0), sticky=W, pady=(20,0))

        l6 = Label(window, text='Tagging', font=('Courier', 20))
        l6.grid(row=1, column=2, padx=(10,0), sticky=W)

        l7 = Label(window, text='Approval', font=('Courier', 20))
        l7.grid(row=2, column=2, padx=(10,0), sticky=W)

        l8 = Label(window, text='System', font=('Courier', 20))
        l8.grid(row=0, column=4, padx=(10,0), sticky=W, pady=(20,0))

        l9 = Label(window, text='Location', font=('Courier', 20))
        l9.grid(row=1, column=4, padx=(10,0), sticky=W)

        l10 = Label(window, text='Quantity', font=('Courier', 20))
        l10.grid(row=2, column=4, padx=(10,0), sticky=W)

        #===========================================================
        
        self.contact_text = StringVar()
        self.e2 = Entry(window, width=40, textvariable=self.contact_text,font=('Courier', 15))
        self.e2.grid(row=0, column=1, pady=(20,0), sticky=W)
        
        self.part_num_text = StringVar()
        self.e3 = Entry(window, width=40, textvariable=self.part_num_text,font=('Courier', 15))
        self.e3.grid(row=1, column=1,sticky=W)
        
        self.description_text = StringVar()
        self.e4 = Entry(window, width=40, textvariable=self.description_text,font=('Courier', 15))
        self.e4.grid(row=2, column=1,sticky=W)

        self.status_text = StringVar()
        self.e5 = Entry(window, width=40, textvariable=self.status_text,font=('Courier', 15))
        self.e5.grid(row=0, column=3, pady=(20,0),sticky=W)

        self.tagging_text = StringVar()
        self.e6 = Entry(window, width=40, textvariable=self.tagging_text,font=('Courier', 15))
        self.e6.grid(row=1, column=3,sticky=W)

        self.approval_text = StringVar()
        self.e7 = Entry(window, width=40, textvariable=self.approval_text,font=('Courier', 15))
        self.e7.grid(row=2, column=3,sticky=W)

        self.system_text = StringVar()
        self.e8 = Entry(window, width=40, textvariable=self.system_text,font=('Courier', 15))
        self.e8.grid(row=0, column=5, pady=(20,0))

        self.location_text = StringVar()
        self.e9 = Entry(window, width=40, textvariable=self.location_text,font=('Courier', 15))
        self.e9.grid(row=1, column=5)

        self.quantity_text = StringVar()
        self.e10 = Entry(window, width=40, textvariable=self.quantity_text,font=('Courier', 15))
        self.e10.grid(row=2, column=5)

        #===========================================================

        self.list1 = Listbox(window, width=150, height=20, font=('Courier', 17))
        self.list1.grid(row=3,column=0,rowspan=100,columnspan=5,padx=(20, 0),pady=(30, 0))
        self.list1.bind('<<ListboxSelect>>', self.get_selected_row)
        self.list2 = Listbox()

        #===========================================================

        sb1 = Scrollbar(window, width=20)
        sb1.grid(row=98, column=5, padx=(10, 0), sticky=W)
        self.list1.config(yscrollcommand=sb1.set)
        sb1.config(command=self.list1.yview)

        sb2 = Scrollbar(window, width=20, orient='horizontal')
        sb2.grid(row=110, column=4, rowspan=4, pady=10, sticky=E)
        self.list1.config(xscrollcommand=sb2.set)
        sb2.config(command=self.list1.xview)

        #===========================================================
        
        b1 = Button(window, text='View all', width=20,command=self.view_command, font=('Courier', 18))
        b1.grid(row=3, column=5, pady=(100,0), padx=(20,0))

        b2 = Button(window, text='Search entry', width=20,command=self.search_command, font=('Courier', 18))
        b2.grid(row=4, column=5, padx=(20,0))

        b3 = Button(window, text='Add entry', width=20,command=self.add_command, font=('Courier', 18))
        b3.grid(row=5, column=5, padx=(20,0))

        b4 = Button(window, text='Update selected', width=20,command=self.update_command, font=('Courier', 18))
        b4.grid(row=6, column=5, padx=(20,0))

        b5 = Button(window, text='Delete selected', width=20,command=self.delete_command, font=('Courier', 18))
        b5.grid(row=7, column=5, padx=(20,0))

        b6 = Button(window, text='Forms', width=20,command=self.form_command, font=('Courier', 18))
        b6.grid(row=8, column=5, padx=(20,0))

        b7 = Button(window, text='Help', width=20,command=self.help_command, font=('Courier', 18))
        b7.grid(row=9, column=5, padx=(20,0))

        b6 = Button(window, text='Close', width=20,command=window.destroy, font=('Courier', 18))
        b6.grid(row=10, column=5, padx=(20,0))

    #===============================================================

    def get_selected_row(self, event): 
        try:
            index = self.list1.curselection()[0]
            self.selected_tuple = self.list2.get(index)

            self.e2.delete(0, END)
            self.e2.insert(END, self.selected_tuple[2])

            self.e3.delete(0, END)
            self.e3.insert(END, self.selected_tuple[3])

            self.e4.delete(0, END)
            self.e4.insert(END, self.selected_tuple[4])

            self.e5.delete(0, END)
            self.e5.insert(END, self.selected_tuple[5])

            self.e6.delete(0, END)
            self.e6.insert(END, self.selected_tuple[6])

            self.e7.delete(0, END)
            self.e7.insert(END, self.selected_tuple[7])

            self.e8.delete(0, END)
            self.e8.insert(END, self.selected_tuple[8])

            self.e9.delete(0, END)
            self.e9.insert(END, self.selected_tuple[9])

            self.e10.delete(0, END)
            self.e10.insert(END, self.selected_tuple[10])

        except IndexError:
            pass 

    #===============================================================

    def view_command(self):
        self.list1.delete(0, END)
        self.list2.delete(0, END)
        for i,row in enumerate(reversed(database.view())):
            row = list(row)
            if i == 0:
                categories = '{:3} {:20} {:30} {:15} {:60} {:10} {:10} {:10} {:15} {:10} {:4}'.format("ID", "Timestamp", "Contact", "Part Number", "Description", "Status", "Tagging", "Approval", "System", "Location", "Quantity")
                blanks = ' '*10
                self.list1.insert(END, categories)
                self.list2.insert(END, blanks)
                delimiter = '-'*205
                self.list1.insert(END, delimiter)
                self.list2.insert(END, blanks)
            with open('deleted.txt', 'r') as f:
                if row[1] in f.read():
                    continue            
            formatted_row = '{:3} {:20} {:30} {:15} {:60} {:10} {:10} {:10} {:15} {:10} {:4}'.format(str(row[0]), row[1],row[2],row[3],row[4],row[5],row[6],row[7],row[8],row[9],row[10])
            self.list1.insert(END, formatted_row)
            self.list2.insert(END, row)

    def search_command(self):
        self.list1.delete(0, END)
        for row in database.search(self.timestamp_text.get(), self.contact_text.get(), self.part_num_text.get(), self.description_text.get(), self.status_text.get(), self.tagging_text.get(), self.approval_text.get(), self.system_text.get(), self.location_text.get(), self.quantity_text.get()):
            self.list1.insert(END, row)

    def add_command(self):
        #if (' ' in self.contact_text.get() or ' ' in self.part_num_text.get() or ' ' in self.description_text.get() or ' ' in self.status_text.get() or ' ' in self.tagging_text.get() or ' ' in self.approval_text.get() or ' ' in self.system_text.get() or ' ' in self.location_text.get() or ' ' in self.quantity_text.get()):
        #    messagebox.showinfo('Error!','Please use underscores in place of spaces', icon='error')
        #    return

        database.insert(strftime("%-m/%-d/%Y %H:%M:%S", gmtime()), self.contact_text.get(), self.part_num_text.get(), self.description_text.get(), self.status_text.get(), self.tagging_text.get(), self.approval_text.get(), self.system_text.get(), self.location_text.get(), self.quantity_text.get())
        
        self.list1.delete(0, END)
        self.list1.insert(END, (strftime("%-m/%-d/%Y %H:%M:%S", gmtime()), self.contact_text.get(), self.part_num_text.get(), self.description_text.get(), self.status_text.get(), self.tagging_text.get(), self.approval_text.get(), self.system_text.get(), self.location_text.get(), self.quantity_text.get()))
        
        self.list2.delete(0, END)
        self.list2.insert(END, (strftime("%-m/%-d/%Y %H:%M:%S", gmtime()), self.contact_text.get(), self.part_num_text.get(), self.description_text.get(), self.status_text.get(), self.tagging_text.get(), self.approval_text.get(), self.system_text.get(), self.location_text.get(), self.quantity_text.get()))

    def delete_command(self):
        with open('deleted.txt', 'a') as f:
            print(self.selected_tuple[1],file=f)
        
        #self.list1.delete(self.selected_tuple[0])
        #self.list2.delete(self.selected_tuple[0])
        
        database.delete(self.selected_tuple[0])
        self.view_command()

    def update_command(self):
        database.update(self.selected_tuple[0], self.selected_tuple[1], self.contact_text.get(), self.part_num_text.get(), self.description_text.get(), self.status_text.get(), self.tagging_text.get(), self.approval_text.get(), self.system_text.get(), self.location_text.get(), self.quantity_text.get())
        self.view_command()

    def form_command(self):
        win = Toplevel()
        win.geometry("400x175")
        win.title('Forms')

        link = Label(win, text="\nTagging form", fg="blue", cursor="hand2",font=("Courier",17))
        link.place(x=10,y=5)
        link.bind("<Button-1>", lambda event: webbrowser.open_new(r"http://www.google.com") )
        
        link2 = Label(win, text="Administrative approval form", fg="blue", cursor="hand2",font=("Courier",17))
        link2.place(x=10,y=70)
        link2.bind("<Button-1>", lambda event: webbrowser.open_new(r"http://www.google.com") )
        
        link3 = Label(win, text="Procurement form", fg="blue", cursor="hand2",font=("Courier",17))
        link3.place(x=10,y=113)
        link3.bind("<Button-1>", lambda event: webbrowser.open_new(r"https://docs.google.com/forms/d/e/1FAIpQLSc5xMSObb6Pwe-aPFPSDuUURp4VzaN5oVrJvl2lXaBbzx4UGg/viewform") )


    def help_command(self):
        win = Toplevel()
        win.geometry("800x200")
        win.title('Help')
        message = ' View all: Presents all data in time-sorted fashion.\n Search: Presents all rows matching a keyword in any one field.\n Add: Adds an entry to the database according to the text boxes.\n Delete: Deletes selected row from database. \n Update: Updates selected row to information in text boxes. \n Forms: For item tagging, administrative approval, or new procurements.\n'
        Label(win, text=message, font=("Courier", 17), justify=LEFT, anchor='w').pack(fill='both')
        Button(win, width=5, height=2, text='Exit', command=win.destroy).pack()

#===================================================================

window = Tk()
window.geometry('2100x650')
window.resizable(False, False)
Window(window)
window.mainloop()

