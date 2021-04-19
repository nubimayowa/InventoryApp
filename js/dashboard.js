(async function(){
    const products = await getProducts()
    const attendants = await getAttendants()
    populateProductTBody(products, false)
    populateAttendantTBody(attendants, false)
})()


