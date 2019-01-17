<?php
$conn = new mysqli('localhost', 'root', '', 'php06');
if ($conn->connect_errno != 0) //er gaat iets fout ...
{
    die("Probleem bij het leggen van connectie of selecteren van database");
}
$query = "SELECT isbn, title FROM books";
$result = $conn->query($query);
echo "<table cellpadding=\"2\" border=\"1\">";
echo "<tr><th>ISBN</th><th>TITEL</th></tr>";
while ($row = $result->fetch_assoc())
{
    echo "<tr>";
    $isbn = $row["isbn"];
    $title = $row["title"];
    echo "<td>$isbn</td><td>$title</td>";
    echo "</tr>";
}
echo "</table>";
$result->close();
$conn->close();
?>