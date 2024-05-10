<?php
$ourTeam_Details = "SELECT * FROM team_members";
$memberDetails = $conn->query($ourTeam_Details);
if ($memberDetails->num_rows > 0) {
    while ($row = $memberDetails->fetch_assoc()) {
        $memberName = $row['member_name'];
        echo <<<displayTeamMembers
            <div class = 'team-member-info'>
                <img src = '{$row['photo_path']}'>
                <h4 class='team-member-name heading-font'>{$row['member_name']}</h4>
                <p class ='text-font'>{$row['member_position']}</p>
                <button class='deleteMemberBtn text-font' onclick='confirmRemoveMember("$memberName")'><i class="fa-solid fa-trash"></i>Remove</button>
            </div>
        displayTeamMembers;
    }
}
