<?php
include("connection.php");

/* Holidays */
$holiday_result = mysqli_query($conn,"SELECT holiday_date, holiday_name FROM holidays");

$holidays = [];

while($row = mysqli_fetch_assoc($holiday_result))
{
    $holidays[$row['holiday_date']] = $row['holiday_name'];
}

/* Timetable */

$lecture_result = mysqli_query($conn,"
SELECT lecture_date,subject_name
FROM timetable
");

$lectures = [];

while($row=mysqli_fetch_assoc($lecture_result))
{
    $lectures[$row['lecture_date']]=$row['subject_name'];
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Holiday Calendar</title>

<style>

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:#f4f6f9;
}

.container{
    width:500px;
    margin:40px auto;
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.2);
}

h2{
    text-align:center;
    color:#2c3e50;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin:20px 0;
}

button{
    padding:8px 15px;
    border:none;
    background:#3498db;
    color:white;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#2980b9;
}

#monthYear{
    font-size:22px;
    font-weight:bold;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#3498db;
    color:white;
    padding:10px;
}

td{
    width:14.28%;
    height:60px;
    text-align:center;
    border:1px solid #ddd;
    font-size:18px;
}

.today{
    background:#27ae60;
    color:white;
    border-radius:50%;
    font-weight:bold;
}

.holiday{
    background:#e74c3c;
    color:white;
    font-weight:bold;
}

.lecture{
    background:#3498db;
    color:white;
    font-weight:bold;
}

td{
    cursor:pointer;
}


</style>

</head>

<body>

<div class="container">

<h2>📅 Calendar</h2>

<div class="header">

<button onclick="previousMonth()">◀</button>

<div id="monthYear"></div>

<button onclick="nextMonth()">▶</button>

</div>

<table>

<thead>

<tr>

<th>Sun</th>
<th>Mon</th>
<th>Tue</th>
<th>Wed</th>
<th>Thu</th>
<th>Fri</th>
<th>Sat</th>

</tr>

</thead>

<tbody id="calendar"></tbody>

</table>

</div>

<script>

let date=new Date();

let month=date.getMonth();

let year=date.getFullYear();

let holidays=<?php echo json_encode($holidays); ?>;

let lectures=<?php echo json_encode($lectures); ?>;

const months=[
"January","February","March","April","May","June",
"July","August","September","October","November","December"
];

function loadCalendar(){

document.getElementById("monthYear").innerHTML=
months[month]+" "+year;

let firstDay=new Date(year,month,1).getDay();

let totalDays=new Date(year,month+1,0).getDate();

let tbl="";

let day=1;

for(let i=0;i<6;i++){

tbl+="<tr>";

for(let j=0;j<7;j++){

if(i==0 && j<firstDay){

tbl+="<td></td>";

}

else if(day>totalDays){

tbl+="<td></td>";

}

else{

let fullDate =
year + "-" +
String(month+1).padStart(2,'0') + "-" +
String(day).padStart(2,'0');

let cls="";
let text=day;

// Sunday = Holiday
let dayOfWeek = new Date(year, month, day).getDay();

if(dayOfWeek == 0)
{
    cls = "holiday";
}

if(holidays[fullDate])
{
    cls="holiday";
}

if(lectures[fullDate])
{
    cls="lecture";
    text += "<br><small>"+lectures[fullDate]+"</small>";
}

if(
day==new Date().getDate() &&
month==new Date().getMonth() &&
year==new Date().getFullYear()
){
    cls="today";
}

tbl +=
"<td class='"+cls+"' onclick='showInfo(\""+fullDate+"\")'>"
+text+
"</td>";

day++;

}

}

tbl+="</tr>";

}

document.getElementById("calendar").innerHTML=tbl;

}

function previousMonth(){

month--;

if(month<0){

month=11;

year--;

}

loadCalendar();

}

function nextMonth(){

month++;

if(month>11){

month=0;

year++;

}

loadCalendar();

}

loadCalendar();

function showInfo(date)
{

let d = new Date(date);

if(d.getDay() == 0)
{
    alert(
    "🎉 Weekly Holiday\n\nSunday\n\nDate : " + date
    );
    return;
}

    if(holidays[date])
    {
        alert(
        "🎉 Holiday\n\n"+
        holidays[date]+
        "\n\nDate : "+date);

        return;
    }

    if(lectures[date])
    {
        alert(
        "📚 Lecture\n\n"+
        lectures[date]+
        "\n\nDate : "+date);

        return;

}
        if(lectures[fullDate])
{
    text = day;
}
    

    alert("No Holiday / Lecture\n\nDate : "+date);

}

</script>

</body>

</html>