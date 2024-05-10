document.getElementById("editBtn").addEventListener("click", function () {
  document.getElementById("editSettingsContainer").style.display = "block";
});

document.getElementById("closeEditMenu").addEventListener("click", function () {
  document.getElementById("editSettingsContainer").style.display = "none";
});

document
  .getElementById("editContactDetails")
  .addEventListener("click", function () {
    document.getElementById("getContactDetails").style.display = "block";
  });

document
  .getElementById("closeGetContactDetails")
  .addEventListener("click", function () {
    document.getElementById("getContactDetails").style.display = "none";
  });

// script for opening and closing add team member modal
document.getElementById("addMemberbtn").addEventListener("click", function () {
  document.getElementById("teamMember-modal").style.display = "block";
});

document
  .getElementById("closeAddMember")
  .addEventListener("click", function () {
    document.getElementById("teamMember-modal").style.display = "none";
  });

  // to delete a member 
  function confirmRemoveMember(memberName){
    if(confirm("Are you sure you want to remove this Member?")){
      removeMember(memberName);
    }
  }
  function removeMember(memberName){
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'deleteEmployee.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function(){
      if(xhr.readyState == XMLHttpRequest.DONE){
        if(xhr.status == 200){
          location.reload();
        }
        else{
          console.error('Error: ' + xhr.status);
        }
      }
    };
    xhr.send("memberName=" + memberName);
  }