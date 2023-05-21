const toDoItems = document.querySelector('.to-do-items');
const deadlineInput = document.getElementById('deadline-input');
const addButton = document.getElementById('add-button');

input.addEventListener("keydown", function(event){
    if(event.key === "Enter")
    addItem();
})

//code for the deadline input
function addItem() {
  const input = document.getElementById('input').value;
  
  const divParent = document.createElement('div');
  divParent.className = 'item';
  
  const itemText = document.createElement('div');
  itemText.textContent = input;
  divParent.appendChild(itemText);
  
  const deadlineLabel = document.createElement('div');
  deadlineLabel.textContent = 'Deadline:';
  divParent.appendChild(deadlineLabel);

  const deadlineInput = document.createElement('input');
  deadlineInput.type = 'date';
  divParent.appendChild(deadlineInput);

  // Clear input field
  document.getElementById('input').value = '';
  deadlineInput.value = '';

  // Add the new to-do item to the container
  toDoItems.appendChild(divParent);
}