const express = require('express');
const sqlite3 = require('sqlite3').verbose();
const cors = require('cors');
const app = express();

app.use(cors())
app.use(express.json)

const db = new sqlite3.Database('test.db',sqlite3.OPEN_READWRITE, (err)=>{
    if(!err) return console.log("connected")
});

app.get("/submitform", (req, res) => {
    console.log("GET Request Successfull!");
    res.send("Get Req Successfully initiated");
    })

app.post("/records",(req,res) => {
    const {name, emailid} = req.body

    console.log(req.body.name)

   /* db.all('INSERT INTO records(name,emailid) VALUES (?,?)',[name, emailid], (err) => {
        if(err) return console.error(err.message) 
        else return console.log("Entered!")
    })*/
})

app.listen(5000,()=> console.log('listening at port 5000'))


// Connect to SQLite database
/*const db = new sqlite3.Database('test.db',sqlite3.OPEN_READWRITE, (err)=>{
    if(!err) return console.log("connected")
});*/






// database created succesfully





//create table if not exists

// Middleware to parse JSON bodies
/*app.use(express.json());

app.post('api/records', (res) => {
    db.each("SELECT * FROM records", (err, rows) => {
        if (err) {
            res.status(500).json({ error: err.message });
            return;
        }
        res.json(rows);
    });
});*/




//const sql = 'CREATE TABLE IF NOT EXISTS records(id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, emailid TEXT) '
//db.run(sql,(err)=> {
//    if(!err) return console.log("table created succesfully")
//});
//table created succesfully



//insert data into table named records
/*db.run('INSERT INTO records(name, emailid) VALUES (?, ?)', ["Karan", "karan17@gmail.com"], (err) => {
    if(err) return console.error(err.message) 
    else return console.log("Entered!")
} )*/
// data inserted succesfully


/*app.use(bodyParser.json);

app.post("/records", (req, res) => {
    try{
        console.log(req.body.name);
        return res.json({
            status: 200,
            success: true,
        });

    }catch(error){
        return res.json({
            status : 400,
            success : false,
        })
    }*/
