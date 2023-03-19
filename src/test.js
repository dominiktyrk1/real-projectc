const currencyDropdown = document.getElementById("currency-dropdown");

fetch("https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1&sparkline=false")
  .then(response => response.json())
  .then(data => {
    data.forEach(coin => {
      const option = document.createElement("option");
      option.value = coin.id;
      option.innerHTML = `<img src="${coin.image}" width="16" height="16" style="margin-right: 5px">${coin.name} (${coin.symbol.toUpperCase()})`;
      currencyDropdown.appendChild(option);
    });
  });
  
const cryptoSelect = document.getElementById("crypto-select");
const priceField = document.getElementById("price-field");

const apiUrl = "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1";

fetch(apiUrl)
  .then(response => response.json())
  .then(data => {
    // extract the name and price of each crypto and add them as options to the select element
    data.forEach(crypto => {
      const option = document.createElement("option");
      option.value = crypto.current_price;
      option.innerHTML = `<img src="${crypto.image}" width="16" height="16" style="margin-right: 5px">${crypto.name}`;
      
      cryptoSelect.add(option);
    });
  })
  .catch(error => console.log(error));

cryptoSelect.addEventListener("change", () => {
  const selectedCryptoPrice = cryptoSelect.value;
  priceField.value = selectedCryptoPrice;
});

let cryptoList = [];
let filteredList = [];
async function calculateProfit() {
  const buyPriceInput = document.getElementById('price-field');
  const investmentInput = document.getElementById('investment');
  const sellPriceInput = document.getElementById('sell-price');
  const initialFeeInput = document.getElementById('initial-fee');
  const exitFeeInput = document.getElementById('exit-fee');

  const buyPrice = parseFloat(buyPriceInput.value);
  const investment = parseFloat(investmentInput.value);
  const sellPrice = parseFloat(sellPriceInput.value);
  const initialFee = parseFloat(initialFeeInput.value) || 0;
  const exitFee = parseFloat(exitFeeInput.value) || 0;

  const selectedCrypto = filteredList.find(crypto => crypto.name.toLowerCase() === searchBar.value.toLowerCase());
  if (selectedCrypto) {
    const cryptoPrice = await getCryptoPrice(selectedCrypto.id);
    buyPriceInput.value = cryptoPrice;
  }

  const profit = (sellPrice - buyPrice) / buyPrice * investment - initialFee  - exitFee;

  document.getElementById("profit").value = profit.toFixed(2);
}

function search_crypto() {
  const input = document.getElementById('coin-search').value.toLowerCase();
  const cryptoElements = document.querySelectorAll('.Cryptocurrency');
  cryptoElements.forEach(cryptoElement => {
    const cryptoName = cryptoElement.textContent.toLowerCase();
    if (cryptoName.includes(input)) {
      cryptoElement.style.display = 'list-item';
    } else {
      cryptoElement.style.display = 'none';
    }
  });
}

const inputs = document.querySelectorAll('.calculator input[type="number"]');
inputs.forEach(input => input.addEventListener('input', calculateProfit));



function toggleAPYCalculator() {
  var apyCalculator = document.getElementById("apy-calculator");
  var profitCalculator = document.getElementById("profit-calculator");
  if (apyCalculator.style.display === "none") {
    apyCalculator.style.display = "block";
    profitCalculator.style.display = "none";
  } else {
    apyCalculator.style.display = "none";
  }
}

function toggleProfitCalculator() {
  var apyCalculator = document.getElementById("apy-calculator");
  var profitCalculator = document.getElementById("profit-calculator");
  if (profitCalculator.style.display === "none") {
    profitCalculator.style.display = "block";
    apyCalculator.style.display = "none";
  } else {
    profitCalculator.style.display = "none";
  }

  // Calculate the interest accrued and update the "Interest Accrued" field
  function calculateInterest() {
    // Get the values from the input fields
    let initialDeposit = parseFloat(document.getElementById("price-field").value);
    let interestRate = parseFloat(document.getElementById("Interest Rate").value) / 100;
    let months = parseInt(document.getElementById("months").value);
    let monthlyDeposits = parseFloat(document.getElementById("Monthl Deposits").value);
    
    // Calculate the interest accrued
    let totalInterest = initialDeposit * (interestRate / 12) * months;
    if (monthlyDeposits) {
      for (let i = 1; i <= months; i++) {
        totalInterest += (monthlyDeposits * (interestRate / 12));
      }
    }
    // Update the "Interest Accrued" field
    document.getElementById("Interest Accured").value = totalInterest.toFixed(2);
  }

  function calculateAPY() {
    calculateInterest();
    const initialDeposit = parseFloat(document.getElementById("price-field").value.replace("$", ""));
    const interestRate = parseFloat(document.getElementById("Interest Rate").value.replace("%", "")) / 100;
    const months = parseInt(document.getElementById("months").value);
    const monthlyDeposits = parseFloat(document.getElementById("Monthl Deposits").value.replace("$", ""));

    let total = initialDeposit;
    let monthlyInterest = 0;
    let totalInterest = 0;

    for (let i = 0; i < months; i++) {
      monthlyInterest = (total + monthlyDeposits) * (interestRate / 12);
      totalInterest += monthlyInterest;
      total += monthlyDeposits + monthlyInterest;
    }
    document.getElementById("apy").value = "$" + ((total / initialDeposit - 1) * 100).toFixed(2);
  }
  document.querySelector("button").addEventListener("click", calculateAPY);
}