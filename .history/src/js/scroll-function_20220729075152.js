/* js functions to make scroll buttons work */

function topPage() { // Top of page
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
};

function bottomPage() { // Bottom of page
    document.body.scrollTop = 100000;
    document.documentElement.scrollTop = 100000;
};