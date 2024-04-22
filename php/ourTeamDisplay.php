<?php
$ourTeam_Details = "SELECT * FROM team_members";
$memberDetails = $conn->query($ourTeam_Details);
if ($memberDetails->num_rows > 0) {
    while ($row = $memberDetails->fetch_assoc()) {
        echo "<div class = 'team-member-info'>";
        echo "<img src = '{$row['photo_path']}'>";
        echo "<h4 class='team-member-name heading-font'>{$row['member_name']}</h4>";
        echo "<p class ='text-font'>{$row['member_position']}</p>";
        echo "</div>";
 
    }
}
