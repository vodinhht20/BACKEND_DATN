jQuery.validator.addMethod("validDate", function(value, element) {
  return this.optional(element) || isDate(value);
}, "Please enter a valid date in the format DD/MM/YYYY");

jQuery.validator.addMethod("phoneVN", function (phone_number, element) {
  phone_number = phone_number.replace(/\s+/g, "");
  return this.optional(element) || phone_number.length > 9 &&
  phone_number.match(/^\+[0-9]{11}$/);
}, "Please specify a valid phone number");

function validateForm (element,objData, funcAjax = '', flag = false) {
  $(element).validate({
    rules: objData.rules,
    messages: objData.messages,
    submitHandler: function(form) {
      if (flag) {
        funcAjax();
      } else {
        form.submit();
      }
    },
  });
}
function isDate(txtDate)
{
    var currVal = txtDate;
    if(currVal == '')
        return false;
    
    var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
    var dtArray = currVal.match(rxDatePattern);
    
    if (dtArray == null) 
        return false;
    
    dtMonth = dtArray[3];
    dtDay= dtArray[1];
    dtYear = dtArray[5];
    
    if (dtMonth < 1 || dtMonth > 12) 
        return false;
    else if (dtDay < 1 || dtDay> 31) 
        return false;
    else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31) 
        return false;
    else if (dtMonth == 2) 
    {
        var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
        if (dtDay> 29 || (dtDay ==29 && !isleap)) 
                return false;
    }
    return true;
}