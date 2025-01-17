<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
}

/* Style the header */
header {
  background-color: #3b5998; /* لون خلفية الهيدر المستخدم في فيسبوك */
  padding: 20px;
  text-align: center;
  font-size: 35px;
  color: white;
}

/* Create two columns/boxes that float next to each other */
nav {
  float: left;
  width: 30%;
  background: #f0f2f5; /* لون خلفية القائمة */
  padding: 20px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

nav ul li {
  margin-bottom: 10px;
}

nav ul li a {
  text-decoration: none;
  color: #3b5998; /* لون الروابط */
  font-weight: bold;
}

nav ul li a:hover {
  color: #2d4373; /* لون الروابط عند التحويم */
}

article {
  float: left;
  width: 70%;
  background-color: #ffffff; /* لون خلفية المقال */
  padding: 20px;
}

/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background-color: #3b5998; /* لون خلفية التذييل المستخدم في فيسبوك */
  padding: 10px;
  text-align: center;
  color: white;
  position: fixed;
  bottom: 0;
  width: 100%;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
    float: none;
  }
}
</style>
</head>
<body>

<header>
  <h2>Cities</h2>
</header>

<section>
  <nav>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Chats</a></li>
      <li><a href="#">Notifications</a></li>
    </ul>
  </nav>
  
  <article>
    <h1>London</h1>
    <p>London is the capital city of England. It is the most populous city in the United Kingdom, with a metropolitan area of over 13 million inhabitants.</p>
    <p>Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans, who named it Londinium.</p>
  </article>
</section>

<footer>
  <p>Footer</p>
</footer>

</body>
</html>
