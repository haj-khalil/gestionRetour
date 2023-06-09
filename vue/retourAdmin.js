
function filterTable() {
    var input = document.getElementById("searchInput");
    var filter = input.value.toLowerCase().trim();
    var rows = document.querySelectorAll("tbody tr");

    var noResultsMessage = document.getElementById("messageRecherch");
    var hasResults = false;

    rows.forEach(function(row) {
      var columns = row.getElementsByTagName("td");
      var found = false;

      for (var i = 0; i < columns.length; i++) {
        var columnText = columns[i].textContent.toLowerCase();

        if (columnText.includes(filter)) {
          found = true;
          break;
        }
      }

      if (found) {
        row.style.display = "";
        hasResults = true;
      } else {
        row.style.display = "none";
      }
    });

    if (hasResults) {
      noResultsMessage.style.display = "none";
    } else {
      noResultsMessage.style.display = "block";
    }
  }
