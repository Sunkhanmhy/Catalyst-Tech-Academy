<?php


<!-- Script Start ------------------------------------------------------------------------------------------------------------ -- >	
	
<script>
  // Example regions: US, EU, and Other
  const urls = {
	  
    btnpowerbi: { US: "https://buy.stripe.com/28ocPf4yrdIg824288", EU: "https://buy.stripe.com/6oE02taWPgUseqsbIJ", OTHER: "https://buy.stripe.com/7sIcPfaWP1Zy1DG4gi" },  btnexcel: {  US: "https://buy.stripe.com/9AQcPfc0TcEcfuw7sy", EU: "https://buy.stripe.com/8wM5mN7KDaw41DGaEI",  OTHER: "https://buy.stripe.com/00gg1r5CveMkeqs9AD"  },	  
    btnpython: { US: "https://buy.stripe.com/cN2dTj8OH47GfuwbIP",  EU: "https://buy.stripe.com/5kAbLbfd547GaacdQY", OTHER: "https://buy.stripe.com/cN202t7KDcEc6Y014d" },  btnr: { US: "https://buy.stripe.com/8wM6qRgh9aw43LOfZ8",      EU: "https://buy.stripe.com/14k16x4yr1ZyaacaEP", OTHER: "https://buy.stripe.com/5kA8yZ3un7jScikaEQ"  },	  
    btnrdbms: {  US: "https://buy.stripe.com/14keXn0ib1Zy6Y0aER",  EU: "https://buy.stripe.com/9AQ2aBaWPaw4aac4gu", OTHER: "https://buy.stripe.com/3csg1rfd50VugyAdR5" },  btnbm: { US: "https://buy.stripe.com/cN216x3ungUseqs14k",     EU: "https://buy.stripe.com/fZe16x0ibdIgbegcN3",  OTHER: "https://buy.stripe.com/bIY5mN0ibbA8aacfZg" },
    btndatascience: { US: "https://buy.stripe.com/8wMg1r4yr9s01DG00j",  EU: "https://buy.stripe.com/bIYeXne91gUsdmoeVe",  OTHER: "https://buy.stripe.com/bIYeXne91gUsdmoeVe" },  btnaccelerated: { US: "https://buy.stripe.com/bIYdTje917jS2HK3cy",  EU: "https://buy.stripe.com/00gaH77KD6fOdmo3cz",  OTHER: "https://buy.stripe.com/9AQ9D3gh90Vufuw00o" },
    btnfront: { US: "https://buy.stripe.com/28o8yZ0ibaw4eqs9AZ",  EU: "https://buy.stripe.com/aEU7uV1mf0Vu1DG00q",  OTHER: "https://buy.stripe.com/aEUg1r6Gz1ZygyA14v" },  btnback: { US: "https://buy.stripe.com/7sI2aB4yrdIg1DG00s",   EU: "https://buy.stripe.com/14k7uV9SL33C0zC3cF",  OTHER: "https://buy.stripe.com/14k3eFaWPgUseqscNg" },
	btnfullstack: { US: "https://buy.stripe.com/4gwbLb0ib0Vu2HKeVp", EU: "https://buy.stripe.com/eVa7uV4yrcEc0zC6oU", OTHER: "https://buy.stripe.com/5kA3eF3unbA8aacaFb" },	btnsoftware: { US: "https://buy.stripe.com/4gwg1re9133C0zC6oW", EU: "https://buy.stripe.com/bIY4iJ7KDaw41DGdRp",  OTHER: "https://buy.stripe.com/5kA3eFgh98nW1DGaFe" }, btnpt: { US: "https://buy.stripe.com/fZe2aBgh9gUsbegcNn", EU: "https://buy.stripe.com/5kA9D3d4X33C82400C", OTHER: "https://buy.stripe.com/bIY2aBfd5aw43LO9Bd" }, btncb: { US: "https://buy.stripe.com/00g02t9SLbA88245kY", EU: "https://buy.stripe.com/bIYaH73un8nWbeg5kZ",  OTHER: "https://buy.stripe.com/4gwaH70ib33Cdmo00G" }	
	
  };

  function determineRegion(lat, lon) {
    // Very simple logic for demo: customize for real use
    if (lat >= 24 && lat <= 49 && lon >= -125 && lon <= -66) return "US"; // Rough US box
    if (lat >= 35 && lat <= 71 && lon >= -10 && lon <= 40) return "EU";   // Rough Europe box
    return "OTHER";
  }

  function assignButtons(region) {
    Object.keys(urls).forEach(btnId => {
      const button = document.getElementById(btnId);
      button.onclick = () => {
        window.location.href = urls[btnId][region];
      };
    });
  }

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      position => {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;
        const region = determineRegion(lat, lon);
        assignButtons(region);
      },
      error => {
        console.warn("Geolocation failed, defaulting to OTHER");
        assignButtons("OTHER");
      }
    );
  } else {
    console.warn("Geolocation not supported, defaulting to OTHER");
    assignButtons("OTHER");
  }
</script>

<!-- Script End ------------------------------------------------------------------------------------------------------------ -- >
	
?>