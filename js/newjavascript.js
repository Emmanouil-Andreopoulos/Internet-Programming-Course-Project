/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function make_blank(oInput)
{
    if (!('placeholder' in oInput))
        oInput.placeholder = oInput.value;
    if (oInput.value != oInput.placeholder)
        oInput.value = '';
}

function restore_placeholder(oInput)
{
    if (oInput.value == '' && 'placeholder' in oInput)
        oInput.value = "search";
}


