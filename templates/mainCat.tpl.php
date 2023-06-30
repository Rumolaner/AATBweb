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
      <button type="reset">{{clear}}</button> <button type="button" onClick="searchCat()">{{search}}</button>
    </form>
  </div>
</div>
