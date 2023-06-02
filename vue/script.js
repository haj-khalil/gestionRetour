const searchInput = document.querySelector("#cherch");
const tableBody = document.querySelector("tbody");
const messageRecherch = document.querySelector("#messageRecherch");

let dataArray = [];

async function getClients() {
  const clientsData = await fetchClients();
  dataArray = orderList(clientsData);
  createUserList(dataArray);
}

async function fetchClients() {
  // Ajoutez ici votre propre logique pour récupérer les clients depuis votre base de données
  // Exemple : utilisez une requête AJAX ou une librairie de gestion des requêtes HTTP
  const response = await fetch("/api/clients");
  return response.json();
}

getClients();

function orderList(data) {
  // Ajoutez ici votre propre logique de tri des clients si nécessaire
  // Par exemple, triez les clients par nom de famille
  return data.sort((a, b) => {
    if (a.nom < b.nom) {
      return -1;
    }
    if (a.nom > b.nom) {
      return 1;
    }
    return 0;
  });
}

function createUserList(clientsList) {
  tableBody.innerHTML = ""; // Efface le contenu de la table avant de recréer les lignes des clients

  clientsList.forEach((client) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${client.numeroClient}</td>
      <td>${client.nom}</td>
      <td>${client.prenom}</td>
      <td>${client.email}</td>
      <td>${client.adresse}</td>
      <td>${client.telephone}</td>
      <td>${client.retours}</td>
      <td>${client.effacer}</td>
    `;
    tableBody.appendChild(row);
  });
}

searchInput.addEventListener("input", filterData);

function filterData(e) {
  const searchedString = e.target.value.toLowerCase().replace(/\s/g, "");
  const rows = tableBody.getElementsByTagName("tr");
  let foundResults = false;

  for (let i = 0; i < rows.length; i++) {
    const row = rows[i];
    const cells = row.getElementsByTagName("td");
    let foundInRow = false;

    for (let j = 1; j < cells.length; j++) {
      const cellValue = cells[j].textContent.toLowerCase();

      if (cellValue.includes(searchedString)) {
        foundInRow = true;
        break;
      }
    }

    if (foundInRow) {
      row.style.display = "";
      foundResults = true;
    } else {
      row.style.display = "none";
    }
  }

  if (foundResults) {
    messageRecherch.style.display = "none";
  } else {
    messageRecherch.style.display = "grid";
  }
}
