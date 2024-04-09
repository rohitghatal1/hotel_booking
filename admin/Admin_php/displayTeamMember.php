<?php
$ourTeam_Details = "SELECT * FROM team_members";
$memberDetails = $conn->query($ourTeam_Details);
if ($memberDetails->num_rows > 0) {
    while ($row = $memberDetails->fetch_assoc()) {
        echo <<<displayTeamMembers
            <div class = 'team-member-info'>
                <img src = '{$row['photo_path']}'>
                <h4 class='team-member-name heading-font'>{$row['member_name']}</h4>
                <p class ='text-font'>{$row['member_position']}</p>
                <a class='deleteMemberBtn text-font' href = 'deleteEmployee.php?employeeName={$row['member_name']}'><i class="fa-solid fa-trash"></i>Remove</a>
            </div>
        displayTeamMembers;
    }
}
