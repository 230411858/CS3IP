function setCheckboxesTo(bool) 
{
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (checkbox of checkboxes)
    {
        checkbox.checked = bool;
    }; 
}

function toggleCheckboxes() 
{
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (checkbox of checkboxes)
    {
        checkbox.checked = !checkbox.checked;
    }; 
}