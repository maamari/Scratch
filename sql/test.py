import sqlite3

class Database:
    def __init__(self,db):
        self.conn = sqlite3.connect(db)
        self.cur = self.conn.cursor()
        self.cur.execute("CREATE TABLE IF NOT EXISTS query (id INTEGER PRIMARY KEY, maker TEXT, model TEXT, tyype INTEGER, price INTEGER)")
        self.conn.commit()

    def insert(self,maker, model, tyype, price):
        #the NULL parameter is for the auto-incremented id
        self.cur.execute("INSERT INTO query VALUES(NULL,?,?,?,?)",
                         [maker,model,tyype,price])
        self.conn.commit()

    def view(self):
        self.cur.execute("SELECT * FROM query")
        rows = self.cur.fetchall()
        return rows

    def search(self,maker="", model="", tyype="", price=""):
        self.cur.execute("SELECT * FROM query WHERE maker = ? OR model = ? OR tyype = ? OR price = ?", 
                         (maker, model, tyype, price))
        rows = self.cur.fetchall()
        #conn.close()
        return rows

    def delete(self,id):
        self.cur.execute("DELETE FROM query WHERE id = ?", (id,))
        self.conn.commit()
        #conn.close()

    def update(self,id, maker, model, tyype, price):
        self.cur.execute("UPDATE query SET maker = ?, model = ?, tyype = ?, price = ? WHERE id = ?", [maker, model, tyype, price, id])
        self.conn.commit()

    #destructor-->now we close the connection to our database here
    def __del__(self):
        self.conn.close()


from tkinter import *
from tkinter import messagebox

database = Database("inventory.db")

class Window(object):
    def __init__(self,window):
        self.window = window
        self.window.wm_title("SDAB Inventory")

        l1 = Label(window, text="Maker", font=("Courier",20))
        l1.grid(row=0, column=0, padx=10, pady=20)

        l2 = Label(window, text="Model", font=("Courier",20))
        l2.grid(row=0, column=2, padx=10, pady=20)

        l3 = Label(window, text="tyype", font=("Courier",20))
        l3.grid(row=1, column=0, padx=10)

        l4 = Label(window, text="Price", font=("Courier",20))
        l4.grid(row=1, column=2, padx=10)

        self.maker_text = StringVar()
        self.e1 = Entry(window, width=30, 
                        textvariable=self.maker_text, 
                        font=('Courier', 15))
        self.e1.grid(row=0, column=1)

        self.model_text = StringVar()
        self.e2 = Entry(window, width=30, 
                        textvariable=self.model_text, 
                        font=('Courier', 15))
        self.e2.grid(row=0, column=3)

        self.type_text = StringVar()
        self.e3 = Entry(window, width=30, 
                        textvariable=self.type_text, 
                        font=('Courier', 15))
        self.e3.grid(row=1, column=1)

        self.price_text = StringVar()
        self.e4= Entry(window, width=30, 
                       textvariable=self.price_text, 
                       font=('Courier', 15))
        self.e4.grid(row=1, column=3)

        self.list1 = Listbox(window, width=50, 
                             font=("Courier",15))
        self.list1.grid(row=2, column=0, rowspan=6, 
                        columnspan=3,padx=(20,0), 
                        pady=(20,0))
        self.list1.bind('<<ListboxSelect>>', 
                        self.get_selected_row)
        self.list2 = Listbox()

        # now we need to attach a scrollbar to the listbox, and the other direction,too
        sb1 = Scrollbar(window, width=20)
        sb1.grid(row=2, column=3, rowspan=7, padx=(10,0), sticky=W)
        self.list1.config(yscrollcommand=sb1.set)
        sb1.config(command=self.list1.yview)

        b1 = Button(window, text="View all", width=20, 
                    command=self.view_command, 
                    font=("Courier", 15))
        b1.grid(row=2, column=3, pady=(20,0))

        b2 = Button(window, text="Search entry", width=20, 
                    command=self.search_command, 
                    font=("Courier", 15))
        b2.grid(row=3, column=3)

        b3 = Button(window, text="Add entry", width=20, 
                    command=self.add_command, 
                    font=("Courier", 15))
        b3.grid(row=4, column=3)

        b4 = Button(window, text="Update selected", width=20, 
                    command=self.update_command, 
                    font=("Courier", 15))
        b4.grid(row=5, column=3)

        b5 = Button(window, text="Delete selected", width=20, 
                    command=self.delete_command, 
                    font=("Courier", 15))
        b5.grid(row=6, column=3)

        b6 = Button(window, text="Close", width=20, 
                    command=window.destroy, 
                    font=("Courier", 15))
        b6.grid(row=7, column=3)


    def get_selected_row(self,event):   #the "event" parameter is needed b/c we've binded this function to the listbox
        try:
            index = self.list1.curselection()[0]
            print(index)
            self.selected_tuple = self.list1.get(index).split()
            self.e1.delete(0, END)
            self.e1.insert(END,self.selected_tuple[1])
            self.e2.delete(0, END)
            self.e2.insert(END,self.selected_tuple[2])
            self.e3.delete(0, END)
            self.e3.insert(END,self.selected_tuple[3])
            self.e4.delete(0, END)
            self.e4.insert(END,self.selected_tuple[4])
        except IndexError:
            pass                #in the case where the listbox is empty, the code will not execute

    def view_command(self):
        self.list1.delete(0, END)  # make sure we've cleared all entries in the listbox every time we press the View all button
        for row in database.view():
            formatted_row = '{:2} {:10} {:10} {:10} {:10}'.format(row[0], row[1],row[2],row[3],row[4])
            self.list1.insert(END,formatted_row)
            self.list2.insert(END,row)

    def search_command(self):
        self.list1.delete(0, END)
        for row in database.search(self.maker_text.get(), 
                                   self.model_text.get(), 
                                   self.type_text.get(), 
                                   self.price_text.get()):
            self.list1.insert(END, row)

    def add_command(self):
        if (' ' in self.maker_text.get()) or (' ' in self.model_text.get()) or (' ' in self.type_text.get()) or (' ' in self.price_text.get()):
            messagebox.showinfo("Error!", "Please use underscores, not spaces",icon="error")
            return

        database.insert(self.maker_text.get(), self.model_text.get(), self.type_text.get(), self.price_text.get())
        self.list1.delete(0, END)
        self.list1.insert(END, (self.maker_text.get(), self.model_text.get(), self.type_text.get(), self.price_text.get()))

    def delete_command(self):
        database.delete(self.selected_tuple[0])
        self.view_command()

    def update_command(self):
        #be careful for the next line ---> we are updating using the texts in the entries, not the selected tuple
        database.update(self.selected_tuple[0],self.maker_text.get(), self.model_text.get(), self.type_text.get(), self.price_text.get())
        self.view_command()

#code for the GUI (front end)
window = Tk()
window.geometry('845x340')
window.resizable(False, False)

Window(window)
window.mainloop()

