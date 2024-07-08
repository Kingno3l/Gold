async function searchRecipes() {
  const userInput = document.getElementById("query").value;
  const apiKey = ""; // Replace with your Spoonacular API key
  const apiUrl = `https://api.spoonacular.com/recipes/complexSearch?query=${userInput}&number=6&apiKey=${apiKey}`;

  try {
    const response = await fetch(apiUrl);
    const data = await response.json();
    displayResults(data.results);
  } catch (error) {
    console.error("Error fetching recipe:", error);
  }
}

function displayResults(recipes) {
  const recipeDiv = document.getElementById("results");
  recipeDiv.innerHTML = "";

  if (recipes.length === 0) {
    recipeDiv.innerHTML = "<p>No recipes found</p>";
    return;
  }

  recipes.forEach((recipe) => {
    const recipeeDiv = document.createElement("div");
    recipeeDiv.innerHTML = `
        <h3>${recipe.title}</h3>
        <img src="${recipe.image}" width="200">
      `;
    recipeDiv.appendChild(recipeeDiv);
  });
}
