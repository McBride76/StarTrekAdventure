document.addEventListener("DOMContentLoaded", function()  {
    const HEADING_RACE = document.getElementById('sdRace');
    const SPAN_HOME = document.getElementById('homePlanet');
    const SPAN_QUADRANT = document.getElementById('quadrant');
    const SPAN_STRENGTH = document.getElementById('strength');
    const SPAN_WEAKNESS = document.getElementById('weakness');
    const P_PERK = document.getElementById('perk');
    const P_PERK_DESC = document.getElementById('perkDesc');
    
    const P_DESC = document.getElementById('raceDesc');

    const RADIO_HUMAN = document.getElementById('human');
    const RADIO_KLINGON = document.getElementById('klingon');
    const RADIO_VULCAN = document.getElementById('vulcan');
    const RADIO_BETAZOID = document.getElementById('betazoid');
    const RADIO_FERENGI = document.getElementById('ferengi');

    const BTN_MORE_INFO = document.getElementById('moreInfo');
    const DIV_LONG_DESC = document.getElementById('longDesc');

    let buttons = document.getElementsByTagName('input');

    let btnHoverSound = new Audio();
    btnHoverSound.src = "../sounds/button-hover.mp3";

    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', () => {
            btnHoverSound.play();
        })
    }
    

    RADIO_HUMAN.addEventListener("click", e => {
        let p = "Humans are known for their adaptability and diversity. Hailing from Earth, they have a rich history of overcoming challenges and embracing change. Humans excel in various fields, from diplomacy and leadership to science and engineering, making them valuable members of the United Federation of Planets. Their capacity for growth and willingness to explore the unknown make them a driving force in the galaxy.";
        //let fact = "The first time humans have made contact with another alien species was in 2063 where they met the Vulcans.";
        let perkDesc = "Harness your persuasive skills to deceive or manipulate others, attempting to achieve favorable outcomes even in dire circumstances";
        updateText("Human", "Earth", "Alpha", "Diplomacy", "Emotional", "Bluff", perkDesc, p);
    });

    RADIO_KLINGON.addEventListener("click", e => {
        let p = "Klingons are a humanoid species, renowned for their warrior culture and imposing presence. They embody a strict code of honor, emphasizing bravery, combat skills, and loyalty above all else. Klingon society is organized into noble houses, often engaged in power struggles within the Klingon Empire. They speak the complex Klingonese language and possess advanced military technology, including powerful starships and disruptor weapons. Their unwavering dedication to honor and their combat prowess make Klingons formidable allies and adversaries in the vast expanse of the galaxy.";
        //let fact = "Klingons have a tradition where they drink Bloodwine, a potent alcoholic drink, to celebrate victories and bond with eachother. Kinda like humans."
        let perkDesc = "Your deep understanding of warfare and battle strategy allows you to evaluate your enemies' weaknesses more effectively";
        updateText("Klingon", "Qo'nos", "Beta", "Combat", "Diplomacy", "Warrior's Insight", perkDesc, p);
    });

    RADIO_VULCAN.addEventListener("click", e => {
        let p = "Vulcans are a distinctive humanoid species known for their logical and disciplined nature, originating from the planet Vulcan. They follow a strict philosophy centered on logic and suppressing emotions, emphasizing intelligence and control. Vulcan society values knowledge and rationality, and they possess advanced technology. Their commitment to logic and intellectual prowess makes Vulcans influential figures in the galaxy.";
        //let fact = "The Vulcans weren't always emotionless. The Time of Awakening was a historical event for the Vulcans where they put aside their weapons and began listening to Surak, who spoke of peace and logic."
        let perkDesc = "You have mastered the Vulcan technique of rendering an opponent unconscious with a precise nerve pinch";
        updateText("Vulcan", "Vulcan", "Alpha", "Logic", "Can't Lie", "Nerve Pinch", perkDesc, p);
    });

    RADIO_BETAZOID.addEventListener("click", e => {
        let p = "Betazoids are a unique humanoid species with empathic and telepathic abilities, originating from the planet Betazed. They possess an innate capacity to sense and share emotions with others, which fosters deep interpersonal connections. Betazoid society values emotional openness and communication. While they lack advanced military technology, their empathic abilities make them valuable in diplomatic and empathetic roles throughout the galaxy.";
        //let fact = "Young Betazoids undergo a significant rite of passage called the \"Age of Ascension\". During this time, they learn to control and manage their telepathis abilities.";
        let perkDesc = "Your telepathic talent lets you read minds and emotions, providing a unique capacity for empathy, insight, and diplomacy.";
        updateText("Betazoid", "Betazed", "Alpha", "Diplomacy", "Combat", "Telepathy", perkDesc, p);
    })

    RADIO_FERENGI.addEventListener("click", e => {
        let p = "Ferengi are a distinctive humanoid species known for their profit-driven and commerce-focused culture. Originating from Ferenginar, they prioritize acquiring wealth above all else, adhering to a set of business rules called the \"Rules of Acquisition.\" Ferengi society revolves around trade, with profit as their ultimate goal. They possess advanced technology, especially in the realm of commerce, making them shrewd negotiators and entrepreneurs sought after for economic endeavors in the galaxy.";
        let perkDesc = "Your skill in bartering and negotiation is unmatched, making it easier to strike favorable deals and secure advantageous trades";
        updateText("Ferengi", "Ferenginar", "Alpha", "Trade", "Honor", "Master Negotiator", perkDesc, p);
        
    })

    BTN_MORE_INFO.addEventListener("click", e => {
        DIV_LONG_DESC.classList.toggle('no-display');
    })

    function updateText(race, homeworld, quadrant, strength, weakness, perk, perkDesc, p) {
        HEADING_RACE.innerText = race;
        SPAN_HOME.innerText = homeworld;
        SPAN_QUADRANT.innerText = quadrant;
        SPAN_STRENGTH.innerText = strength;
        SPAN_WEAKNESS.innerText = weakness;
        P_PERK.innerText = perk;
        P_PERK_DESC.innerText = perkDesc;
        P_DESC.innerText = p;
    }

    function alertTest() {
        alert("test");
    }
    
})

