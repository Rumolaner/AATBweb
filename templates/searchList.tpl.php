  <input type="radio" name="{{tab}}Tabs" id="{{tab}}Tab{{lnumber}}">
  <label for="{{tab}}Tab{{lnumber}}">Suchergebnis #{{lnumber}} <div display="inline" onclick="deleteTab('{{tab}}Tab{{lnumber}}')">[X]</div></label>
  <div class="tab">
    <article id="{{tab}}Tab{{lnumber}}_details"></article>
    <ul class="searchList">
      {{elements}}
    </ul>
  </div>
