<x-app-layout :showNavigation="true">
    <x-admin-bar>
        <div class="flex justify-start">
            <x-admin-bar-button id="newButton" color="gray">New</x-admin-bar-button>
            <x-admin-bar-button id="editButton" color="blue">Edit</x-admin-bar-button>
            <x-admin-bar-button id="saveButton" color="green">Save</x-admin-bar-button>
            <x-admin-bar-button id="deleteButton" color="red">Delete</x-admin-bar-button>
        </div>
            <span id="modeDisplay" class="font-bold text-slate-800 text-2xl border border-dotted p-2 max-w-fit rounded-md border-slate-800 mr-6"></span>
    </x-admin-bar>

    <div class="max-w-2xl mx-auto my-6 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div id="viewMode">
            @include('news.partials.view-mode', ['newsItem' => $newsItem])
        </div>
        <div id="editForm" style="display: none;">
            @include('news.partials.edit-mode-form', ['newsItem' => $newsItem])
        </div>
    </div>
</x-app-layout>

<script>
let currentMode = 'view';
let originalHTML = {};

let modeButtons = {
    'view': ['saveButton'],
    'edit': ['newButton', 'editButton'],
};


let modeClasses = {
    'view': ['bg-slate-200', 'text-slate-600'],    
    'edit': ['bg-green-300', 'text-slate-800'],
};

// Update the mode display to edit mode or view mode
Object.keys(modeButtons).forEach(mode => {
    modeButtons[mode].forEach(buttonId => {
        document.getElementById(buttonId).addEventListener('click', function() {
            currentMode = mode;

            if (currentMode === 'edit') {
                ['title', 'publishing_date', 'content'].forEach(id => {
                    let element = document.getElementById(id);
                    originalHTML[id] = element.outerHTML;

                    if (id === 'content') {
                        element.outerHTML = `<textarea id="${id}Input" class="${element.className}">${element.innerText}</textarea>`;
                    } else if (id === 'publishing_date') {
                        element.outerHTML = `<input id="${id}Input" class="${element.className}" type="datetime-local" value="${element.innerText}">`;
                    } else {
                        element.outerHTML = `<input id="${id}Input" class="${element.className}" type="text" value="${element.innerText}">`;
                    }
                });
            } else if (currentMode === 'view') {
                ['title', 'publishing_date', 'content'].forEach(id => {
                    let element = document.getElementById(`${id}Input`);
                    if (element) {
                        element.outerHTML = originalHTML[id];
                    }
                });
            }
        });
    });
});


// Update the mode display to reflect the current mode
    function updateModeDisplay() {
        // Show or hide the edit form and view mode
        document.getElementById('viewMode').style.display = currentMode === 'view' ? 'block' : 'none';
        document.getElementById('editForm').style.display = currentMode === 'edit' ? 'block' : 'none';
        
        // Get the mode display element
        let modeDisplay = document.getElementById('modeDisplay');
        // Display the current mode
        modeDisplay.textContent = currentMode;

        // Remove all classes
        for (let mode in modeClasses) {
            modeDisplay.classList.remove(...modeClasses[mode]);
        } 

        // Add the class for the current mode
        modeDisplay.classList.add(...modeClasses[currentMode]);
    }
    Object.keys(modeButtons).forEach(mode => {
    modeButtons[mode].forEach(buttonId => {
        document.getElementById(buttonId).addEventListener('click', function() {
            currentMode = mode;
            updateModeDisplay();
        });
    });
});
</script>