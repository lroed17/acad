
<html>
<head>
    <title>Laura's Classpage</title>
</head>
<body>
    <?php
        echo "<br>";
        $fullname = "Laura Roed";
        $email = "roed@usc.edu";
        $classyear = "Sophomore (Class of 2021)";
        echo $fullname;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $classyear;
        echo "<br>";echo "<br>";
        echo "It is ";
        echo date("l, F j, Y");
        echo " at ";
        echo date("g:i A");
        echo "<br>";
        echo "<br>";
        echo "You are using ";
        echo $_SERVER['HTTP_USER_AGENT'];
        echo "<br>";
        echo "Your browser is located at ";
        echo $_SERVER['REMOTE_ADDR'];
    ?>

    <div>
    <h3>Labs</h3>
    </div>
    <div>
        <h3>Assignments</h3>
        <br>
        <a href = "1_Assignment_Search_Result_Pages/contact_form_search.php" target="blank">Contact Form 09/06 Part 1</a>
        <br>
        <a href = "1_Assignment_Search_Result_Pages/movie_search.php" target="blank">Movie Search 09/06 Part 2</a>
        <br>
        <a href = "1_Assignment_Search_Result_Pages/class_sched_search.php" target="blank">Class Schedule 09/06 Part 3</a>
        <br>
        <a href = "2_Search_w_Dropdowns_and_ifs/sched_search.php" target="blank">Class Schedule Search with Drop-downs 09/12</a>
        <br>
        <a href = "3_Inserting%20into%20database%20from%20form/classadd.php" target="blank">Inserting Records into Database 09/18</a>
        <br>
        <a href = "4_3PageWorkflow_Search_Results_Details/search_class_sched.php" target="blank">Search Class Sched w/ 3 Workflow Pages 09/20</a>
        <br>
        <a href = "5_drilldown_edit_delete/class_sched_search.php" target="blank">Edit/Update Pages 09/25</a>
        <br>
        <a href = "4_3PageWorkflow_Search_Results_Details/website_proposal.php" target="blank">Website Proposal 09/20</a>
        <br>
        <a href = "7_send_email/sched_email_form.php" target="blank">Email of Class Schedule Lab 10/15</a>
        <br>
        <a href = "TabPro_Project/gantt_chart.php" target="blank">TabPro Gantt Chart 10/15</a>
        <br>
        <a href = "8_Add_Images/sched_search.php" target="blank">Schedule Search w/ Images 10/17</a>
        <br>
        <a href = "TabPro_Project/Milestone_1.php" target="blank">Milestone 1 TabPro 10/22</a>
    </div>
</body>
</html>