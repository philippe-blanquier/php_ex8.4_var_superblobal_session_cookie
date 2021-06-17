/*
 * Javascript File to manage cookie on client side
 */
function JsShowCookies() 
{
    console.log('JsShowCookies()');
    console.info(document.cookie);
}
function JsSetCookie( cookieName, cookieValue)
{
    console.log(`JsSetCookie( cookieName: ${cookieName}, cookieValue: ${cookieValue})`);
    let today= new Date();
    let expiryDate= new Date( today.getTime() + 60);
    // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie/SameSite
    // https://developer.mozilla.org/en-US/docs/web/api/document/cookie (set, delete, check...)
    // https://www.w3schools.com/js/js_cookies.asp
    // https://www.w3schools.com/jsref/jsref_encodeuri.asp
    document.cookie= cookieName + "=" + encodeURI(cookieValue) + "; path=/; SameSite=Lax; max-age=60; expires=" + expiryDate.toUTCString();
}
// for the exercice 8.4...
function JsSaveDataAsCookies( formData1, formData2 )
{
    console.log(`JsSaveDataAsCookies( ${formData1}, ${formData2})`);
    let dataInfoId= document.getElementById(formData1);
    JsSetCookie( dataInfoId.name, dataInfoId.value);
    dataInfoId= document.getElementById(formData2);
    JsSetCookie( dataInfoId.name, dataInfoId.value)
    JsShowCookies();
}
