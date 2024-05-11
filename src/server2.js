const express = require('express');
const app = express();
const cors = require('cors');
const PORT = 3001;
const sqlite3 = require('sqlite3').verbose();
app.use(express.json());

app.use(cors())

const db = new sqlite3.Database('./test.db', (err)=>{
    if(!err) return console.log("connected")
});
 
/*app.get("/submitform", (req, res) => {
    console.log("form submited");
    res.send("Get Req Successfully initiated");
})*/
 
app.put("/admin/tables/api/update/:id", (req, res) => {
    console.log("PUT REQUEST SUCCESSFUL");
    const { id } = req.params;
  const { name, emailid } = req.body;

  // Update user data in the database
  db.run('UPDATE records SET name = ?, emailid = ? WHERE id = ?', [name, emailid, id], function(err) {
    if (err) {
      console.error('Error updating user:', err);
      return res.status(500).send('Error updating user');
    }

    console.log(`User with ID ${id} updated successfully`);
  });
})
 
app.post("/submitform", (req, res) => {
    console.log("POST REQUEST SUCCESSFUL");
    const {name,emailid} = req.body
    db.run('INSERT INTO records(name,emailid) VALUES (?, ?)',[name, emailid],(err)=>{
        if(!err) return console.log("entered")
    })
})

app.get('/admin/tables', (req, res) => {
    db.all('SELECT * FROM records', (err, rows) => {
      if (err) {
        console.error('Error fetching users:', err);
        res.status(500).json({ error: 'Internal Server Error' });
      } else {
        res.json(rows);
      }
    });
  });
 
app.delete("/admin/tables/api/items/:id", (req, res) => {
    console.log("DELETE REQUEST SUCCESSFUL");
    const {id} = req.params
    console.log(id)
    db.run(`DELETE FROM records WHERE id = ?`, [id], (err) => {
      if (err) {
        return res.status(500).send(err.message);
      }
    
      res.status(200).json({message: "Item deleted and id is " });
    });
});
 
app.listen(PORT, () => {
    console.log(`Server established at ${PORT}`);
})