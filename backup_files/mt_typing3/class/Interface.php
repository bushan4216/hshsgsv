<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>
      Google Visualization API Sample
    </title>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['table']});
    </script>
    <script type="text/javascript">

    var isFirstTime = true;
    var options = {'showRowNumber': true};
    var data;
    var queryInput;
        
    // To see the data that this visualization uses, browse to
    // http://spreadsheets.google.com/pub?key=rYQm6lTXPH8dHA6XGhJVFsA
    var query = new google.visualization.Query(
        'http://spreadsheets.google.com/tq?key=rYQm6lTXPH8dHA6XGhJVFsA&pub=1');
    
    function sendAndDraw() {
      // Send the query with a callback function.
      query.send(handleQueryResponse);
    }
    
    function handleQueryResponse(response) {
      if (response.isError()) {
        alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
        return;
      }
      data = response.getDataTable();
      var table = new google.visualization.Table(document.getElementById('querytable'));  
      table.draw(data, {'showRowNumber': true});
      if (isFirstTime) {
      init();  
      }
    }
    
    function setQuery(queryString) {
      // Query language examples configured with the UI
      query.setQuery(queryString);
      sendAndDraw();
      queryInput.value = queryString;
    }
    
    

    google.setOnLoadCallback(sendAndDraw);

    function init() {
      isFirstTime = false;
      (new google.visualization.Table(document.getElementById('table'))).draw(data, options);
      queryInput = document.getElementById('display-query');
    }

    function setQueryFromUser() {
      setQuery(queryInput.value);
    }
    
    </script>
  </head>
<body style="font-family: Arial; border: 0 none;">
<div style="margin-bottom: 10px; padding: 5px; border: 1px solid gray; background-color: buttonface;">
<span> Configure the query</span>
<form action="">
<table style="font-size: 12px; ">
  <tr>
    <td>Select</td>
    <td><select id='query-1' onchange='setQuery(this.value)'>
      <option value=''>None</option>
      <option value='select A,B'>select A,B</option>
      <option value='select A,B,D'>select A,B,D</option>
      <option value='select D,E,A'>select D,E,A</option>
      <option value='select E,G,B,C'>select E,G,B,C</option>
      <option value='select F,A,B,D'>select F,A,B,D</option>
    </select></td>
    <td>Group by:</td>
    <td><select id='query-2' onchange='setQuery(this.value)'>
      <option value=''>None</option>
      <option value='select B,sum(F) group by B'>select B,sum(F) group
      by B</option>
      <option value='select B,avg(G),sum(E) group by B'>select
      B,avg(G),sum(E) group by A</option>
    </select></td>
    <td>Scalar functions:</td>
    <td> <select id='query-3' onchange='setQuery(this.value)'>
      <option value=''>None</option>
      <option value='select F-E'>select F-E</option>
      <option value='select F*G'>select F*G</option>
      <option value='select (F-E)*G'>select (F-E)*G</option>
    </select></td>
    <td>Filter:</td>
    <td><select id='query-3' onchange='setQuery(this.value)'>
      <option value=''>None</option>
      <option value='where G &lt; 80'>where G &lt; 80</option>
      <option value='where G &lt; 90'>where G &lt; 90</option>
      <option value="where D &lt;&gt; 'Asia'">where D &lt;&gt; 'Asia'</option>
    </select></td>
  </tr>
  <tr>
    <td>Pivot:</td>
    <td><select id='query-3' onchange='setQuery(this.value)'>
      <option value=''>None</option>
      <option value='select avg(F) pivot B'>select avg(F) pivot B</option>
      <option value='select sum(G),max(F) pivot D'>select sum(G),max(F) pivot D</option>
    </select></td>
    <td>Offset / limit: </td>
    <td><select id='query-3' onchange='setQuery(this.value)'>
      <option value=''>None</option>
      <option value='offset 3'>offset 3</option>
      <option value='limit 5'>limit 5</option>
      <option value='limit 4 offset 2'>limit 4 offset 2</option>
    </select></td>
    <td>Label / Format:</td>
    <td><select id='query-3' onchange='setQuery(this.value)'>
      <option value=''>None</option>
      <option value="select A label A 'Manager Name'">select A label A
      'Manager Name'</option>
      <option value="select G format G '00%'">select G format G '00%'</option>
    </select></td>
  </tr>
</table>
</form>
</div>
<table style='width: 100%;'>
  <tr style='font-size: 20px;'>
    <td>Original Table</td>
    <td>Query Table</td>
  </tr>
  <tr>
    <td style="width: 50%; padding: 10px; vertical-align: top;">
    <div id="table"></div>
    </td>
    <td style="width: 50%; padding: 10px; vertical-align: top;">
    <div id="querytable"></div>
    <div style='font-size: 15px; font-weight: bold; padding: 5px;'><input
      type="text" style="width: 100%" id='display-query' /> <br></br>
    <input type="button" value='edit &amp; submit' onclick="setQueryFromUser()" /></div>
    </td>
  </tr>
</table>
</body>
</html>
