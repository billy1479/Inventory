// function for checking the addition of a new item type
// if the item name already exists, addition is prevented
function submitButtonHover() {
    let x = document.getElementById('submitButton');
    x.style.opacity = '0.7';
}
function submitButtonLeave() {
    let x = document.getElementById('submitButton');
    x.style.opacity = '1';
}
function loadItemNames(location) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    url = '../../Functions/loadItems.php';
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(location).innerHTML = this.responseText;
        };
    }
    xhttp.open('GET',url,true);
    xhttp.send();
}

// for main item
let currentState = '';
let stockLevel = [];
let highestIndex = [];

let itemQuantity = '';
let itemName = '';
let itemArea = '';

let newType = '';

let newArea = '';

let newNote = '';

let jobName = '';
let jobNote = '';
let jobDate = '';
let itemID = '';

let searchState = '';

// search bar function for the index.html - WORKING
try {
    document.getElementById('searchForm').addEventListener('submit', function (e) {
        e.preventDefault();
        let x = document.getElementById('searchBar').value;
        $('#QuantityEdit').load('Functions/loadStock.php', {itemName:x}, function (data, status) {
            document.getElementById('QuantityEdit').innerHTML = stockLevel['stock'];
        })
        $('#temp').load('Functions/search.php', {itemName:x}, function (data, status) {
            if (myObject == '') {
                alert('This item doesnt exist');
            } else {
                document.getElementById('modalSearch').style.display = 'block';
                currentState = myObject['State'];
                if (currentState == 0) {
                    currentState = 'Not-reserved';
                } else {
                    currentState = 'Reserved';
                }
                document.getElementById('itemSelectEditEntry').innerHTML = myObject['Name'];
                document.getElementById('ShelfAreaEdit').innerHTML = myObject['ShelfArea'];
                document.getElementById('stateEdit').innerHTML = currentState;
                document.getElementById('noteEdit').innerHTML = myObject['Note'];
            }
        })
        
    })
} catch(err) {}
// for the pages subfolder

// search bar function for pages subfolder - WORKING
try {
    document.getElementById('searchForm2').addEventListener('submit', function (e) {
        e.preventDefault();
        let x = document.getElementById('searchBar').value;
        $('#QuantityEdit').load('../../Functions/loadStock.php', {itemName:x}, function (data, status) {
            document.getElementById('QuantityEdit').innerHTML = stockLevel['stock'];
        })
        $('#temp').load('../../Functions/search.php', {itemName:x}, function (data, status) {
            if (myObject == '') {
                alert('This item doesnt exist');
            } else {
            document.getElementById('modalSearch').style.display = 'block';
            currentState = myObject['State'];
            if (currentState == 0) {
                currentState = 'Not-reserved';
            } else {
                currentState = 'Reserved';
            }
            document.getElementById('itemSelectEditEntry').innerHTML = myObject['Name'];
            document.getElementById('ShelfAreaEdit').innerHTML = myObject['ShelfArea'];
            document.getElementById('stateEdit').innerHTML = currentState;
            document.getElementById('noteEdit').innerHTML = myObject['Note'];
        }})
    })
} catch(err) {}

// for the reserve item search - WORKING
try {
    document.getElementById('reserveItemForm').addEventListener('submit', function (e) {
        e.preventDefault();
        let x = document.getElementById('reserveItemSearch').value;
        $('#reservceDisplay').load('Function/reserveItem.php',{itemID:x}, function (data, status) {
            document.getElementById('reserveMesage').innerHTML = 'Item ' + x + ' has been marked as reserved';
        })
    })
} catch(err) {console.log(err)}


// for closing the pop up modals
function closeSearchModal() {
    document.getElementById('modalSearch').style.display = 'none';
    document.getElementById('searchBar').value = '';
}

// For loading the items to the dropdown list in the add items page
// try {
//     var xhttp;
//     xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             document.getElementById('itemSelect2').innerHTML = this.responseText;
//         };
//     }
//     xhttp.open('GET','../../Functions/loadItemsList.php',true)
//     xhttp.send();
// } catch (err) {};

try {
    $('#itemSelect2').load('../../Functions/loadItemsList.php', {mode: '1'}, function (data, status) {})
} catch(err) {}

// function for adding an entry to the main table (add.html)
try {
    // need ben to show me how the barcode generator works
} catch(err) {}


// for reserving an item
try {
    document.getElementById('reserveItemSearchForm').addEventListener('submit', function (e) {
        e.preventDefault();
        let x = document.getElementById('reserveItemInput').value;
        $('#reserveMessage').load('../../Functions/reserveItem.php', {barcode: x}, function (data, status) {
            // 
        })
    })
} catch(err) {}

// For loading item names and their corresponding stock to the main page - DONE
try {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('stockLevelTable').innerHTML = this.responseText;
        };
    }
    xhttp.open('GET','Functions/loadItems.php',true);
    xhttp.send();
} catch(err) {}

// for loading the currently reserved items to the main page

try {
	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('reservedItemTable').innerHTML = this.responseText;
		}
	}
	xhttp.open('GET','Functions/loadReserved.php',true);
	xhttp.send();
} catch(err) {}

// For the change stock area - for loading the item stock when the dropdown is selected
try {
    
    document.getElementById('itemSelect2').addEventListener('change', function () {
        var x = document.getElementById('itemSelect2').value;
        $('#stockDisplay').load('../../Functions/loadStock.php', {itemName: x, mode: '1'}, function (data, status) {
            document.getElementById('stockDisplay').innerHTML = 'Stock level for: ' + x + ' is ' + stockLevel['stock'];
        })
    })
} catch(err) {}

// for changing stock area - submitting new stock value for a item
try {
    document.getElementById('editStockForm').addEventListener('submit', function (e) {
        e.preventDefault();
        var currentItem = document.getElementById('itemSelect2').value;
        var newStock = document.getElementById('changeStockInput').value;
        $('#editStockResponse').load('../../Functions/changeStock.php', {newStock:newStock, itemName:currentItem}, function (data, status) {
            document.getElementById('editStockResponse').innerHTML = 'Stock has been changed to ' + newStock + ' for Item: ' + currentItem;
        })
    })
} catch(err) {}


// for adding entries to the system - IMPORTANT - from the print button on add.html
// try {
//     document.getElementById('addItemForm').addEventListener('submit', function (e) {
//         e.preventDefault();
//         itemQuantity = document.getElementById('itemQuantity').value;
//         itemName = document.getElementById('itemSelect2').value;
//         itemArea = document.getElementById('shelfArea').value;
//         document.body.style.visibility = 'hidden';
//         $('#codeDisplay').load('../../Functions/generateBarcode2.php', {quantity: itemQuantity, itemName: itemName, area: itemArea}, function (data, status) {
//             // document.getElementById('printButtonFrame').style.visibility = 'visible';
//             // let barcodes = document.querySelectorAll('.barcodeImages');
//             // barcodes.forEach(barcode => {
//             //     barcode.style.visibility = 'visible';
//             // })
//         })
        
//         // WILL NOT SHOW THE OTHER IMAGES, NEED TO FIND A DIFFERENT WAY TO MAKE THEM VISIBLE (ALL ARE BEING LOADED IN AND PRINT BUTTON WORKS)

//     })
// } catch(err) {}

function printFunction() {
    document.getElementById('printButtonFrame').style.visibility = 'hidden';
    window.print();
    window.location.replace('add.html')
}

// for adding a new type of item - addItem.html

try {
    document.getElementById('addItemTypeForm').addEventListener('submit', function (e) {
        e.preventDefault();
        newType = document.getElementById('newItemType').value;
        $('#addItemTypeDisplay').load('../../Functions/addItem.php', {itemName: newType}, function (data, status) {
        })
    })
} catch(err){}

// for editing the area of an item - editItem.html

try {
    document.getElementById('editAreaForm').addEventListener('submit', function (e) {
        e.preventDefault();
        newArea = document.getElementById('shelfArea').value;
        barcode = document.getElementById('barcodeID').value;
        $('#editItemAreaDisplay').load('../../Functions/updateEntry.php', {shelfArea: newArea, ID: barcode}, function (data, status) {
            
        })
    })
} catch(err) {}

// for adding notes to an entry - notes.html

try {
    document.getElementById('addNoteForm').addEventListener('submit', function (e) {
        e.preventDefault();
        barcode = document.getElementById('barcodeID').value;
        newNote = document.getElementById('itemNote').value;
        $('#noteMessage').load('../../Functions/addNote.php', {barcode: barcode, note: newNote}, function (data, status) {
            
        })
    })
} catch(err) {}

// for deleting items

try {
    document.getElementById('deleteItemForm').addEventListener('submit', function (e) {
        e.preventDefault();
        barcode = document.getElementById('deleteItemInput').value;
        $('#deleteMessage').load('../../Functions/deleteItem.php', {ID: barcode}, function (data, status) {
        })
        alert('This item has been deleted from the system.')
    })
} catch (err) {}


// --------         THIS IS FOR THE JOB SECTION                 -----------

// ADDING A JOB - meeds to be tested

try {
    document.getElementById('addJobForm').addEventListener('submit', function (e) {
        e.preventDefault();
        jobName = document.getElementById('jobName').value;
        jobNote = document.getElementById('jobNote').value;
        jobDate = document.getElementById('jobDate').value;
        $('#addJobMessage').load('../../Functions/Job/addJob.php', {name: jobName, note: jobNote, date: jobDate}, function (data, status) {
        })
    })
} catch(err) {}

// ADD ITEMS TO A JOB - done

try {
    document.getElementById('addJobItemsForm').addEventListener('submit', function (e) {
        e.preventDefault();
        jobName = document.getElementById('jobSelect').value;
        itemID = document.getElementById('barcodeID').value;
        $('#addJobItemsMessage').load('../../Functions/Job/addJobItems.php', {name: jobName, barcode: itemID}, function (data, status) {
        })
    })
} catch(err) {}

// ADD A NOTE TO A JOB - done

try {
    document.getElementById('addJobNoteForm').addEventListener('submit', function (e) {
        e.preventDefault();
        jobName = document.getElementById('jobSelect').value;
        jobNote = document.getElementById('jobNote').value;
        $('#addJobMessage').load('../../Functions/Job/addJobNote.php', {name: jobName, note: jobNote}, function (data, status) {
        })
    })
} catch(err) {}

// closing a job - done

try {
    document.getElementById('closeJobForm').addEventListener('submit', function (e) {
        e.preventDefault();
        jobName = document.getElementById('jobSelect').value;
        $('#addJobItemsMessage').load('../../Functions/Job/closejob.php', {name: jobName}, function (data, status) {
        })
    })
} catch(err) {}


// for loading job names to select dropdowns - needs testing

try {
    var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('jobSelect').innerHTML = this.responseText;
		}
	}
	xhttp.open('GET','../../Functions/job/loadJobNames.php',true);
	xhttp.send();
} catch(err) {}

// for loading current jobs

try {
    var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('currentJobs').innerHTML = this.responseText;
		}
	}
	xhttp.open('GET','Functions/job/loadJobs.php',true);
	xhttp.send();
} catch(err) {}


