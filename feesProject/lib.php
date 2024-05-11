<!DOCTYPE html>
<html>
<head>
  <title>Book Selection</title>
  <style>
        .center-form{
            justify-content: center;
            display: flex;
            margin: 200px 370px;
            border: 3px solid blue;
            background-color: yellow;
        }
    </style>
</head>
<body>
    <h1 align='center'>Welcome to Online Library</h1>
    <div class="center-form">

    <form action="test.php" method="POST">
    <lable for="sname">Student Name:- </lable>
        <input type="text"  name="sname" ><br><br>

        <lable for="enrolno">Enrollment no.:- </lable>
        <input type="text"  name="num" ><br><br>
  <label for="subject">Select a subject:</label>
  <select id="subject" name="sub" onchange="updateBooks()">
    <option value="">Select a subject</option>
    <option value="physics">Physics</option>
    <option value="chemistry" >Chemistry</option>
    <option value="mathematics" >Mathematics</option>
  </select>

  <br><br>

  <label for="books">Select a book:</label>
  <select id="books" name="book">
    <option value="">Select a book</option>
  </select>
  <br><br>
  <input type="submit" value = "submit" name="submit">
    </form>

    </div>

  <script>
    function updateBooks(){
        var sub = document.getElementById('subject').value;
        var booksel = document.getElementById('books');
      
        booksel.innerHTML = '<option value="">Select a book</option>';

        if(sub === "physics"){
            populateBooks(['ph1','ph2']);
        }
        if(sub === "chemistry"){
            populateBooks(['ch1','ch2']);
        }
        if(sub === "mathematics"){
            populateBooks(['mh1','mh2']);
        }
    }
    function populateBooks(bookList){
        var booksel = document.getElementById('books');
        bookList.forEach(function(book){
            var option =document.createElement('option');
            option.value = book;
            option.textContent = book;
            booksel.appendChild(option);
            
 
        });
    }
    

  </script>
  <a href="demo.php">Go to Home</a>
</body>
</html>

