<!DOCTYPE html>
<html ng-app="cryptoApp">
<head>
  <meta charset="utf-8">
  <title>Cryptocurrency Prices</title>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <style>
    .positive {
      color: green;
    }  

    .negative {
      color: red;
    }

    .crypto-logo {
      max-width: 30px;
      margin-right: 10px;
    }

    /* Style the search bar */
    .searchbar-container {
      display: flex;
      justify-content: center;
      margin-bottom: 30px;
    }

    .searchbar {
      width: 350px;
      height: 40px;
    }


