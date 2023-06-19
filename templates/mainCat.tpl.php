<div id="mainCat" class="tabs" style="display: none">
  <input type="radio" name="catTabs" id="catTab0" checked="checked">
  <label for="catTab0">{{catfilter}}</label>
  <div class="tab">
    <h2>{{catfilter}}</h2>
    <form class="search">
      <div class="searchtext">{{hint}}</div>
      <label for="catfiltername">{{name}}</label>
      <input type="text" id="catfiltername">
      <label for="catfilterlitter">{{litter}}</label>
      <input type="text" id="catfilterlitter">
      <button type="reset">{{clear}}</button> <button type="button" onClick="Login()">{{submit}}</button>
    </form>
  </div>
  <input type="radio" name="catTabs" id="catTab1">
  <label for="catTab1">Suchergebnis #1 <div display="inline" onclick="deleteTab('catTab1')">[X]</div></label>
  <div class="tab">
    Cats Search Result - Still nothing to see here...
  </div>
  <input type="radio" name="catTabs" id="catTab2">
  <label for="catTab2">Suchergebnis #2 <div display="inline" onclick="deleteTab('catTab2')">[X]</div></label>
  <div class="tab">
    Cats Second Search Result - Still nothing to see here...
  </div>

</div>
