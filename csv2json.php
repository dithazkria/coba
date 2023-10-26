
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSV to JSON</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
</head>
<body>
  <h1>CSV to JSON</h1>
  <input type="file" id="csvFileInput" accept=".csv">
  <button onclick="handleCSVFile()">Convert CSV to JSON</button>
  <pre id="jsonOutput"></pre>

  <script>
    function handleCSVFile() {
      const csvFileInput = document.getElementById("csvFileInput");
      const jsonOutput = document.getElementById("jsonOutput");

      const file = csvFileInput.files[0];
      if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
          const csv = e.target.result;

          Papa.parse(csv, {
            header: true,
            dynamicTyping: true,
            skipEmptyLines: true,
            complete: function (results) {
              const jsonData = JSON.stringify(results.data, null, 2);
              jsonOutput.textContent = jsonData;
            },
          });
        };

        reader.readAsText(file);
      }
    }
  </script>
</body>
</html>
