<style>
header{
    padding: 0 80px;
    height: calc(100vh - 80px);
    display: flex;
    align-items: center;
    justify-content: space-between;
    opacity: 0; 
    transform: translateY(50px); 
    transition: transform 1.0s ease-out, opacity 1.0s ease-out;
    margin-bottom: 20px;
}

header.loaded {
    opacity: 1; 
    transform: translateY(0); 
}

header .left{
    width: 700px;
}

header .left h1{
    font-size: 60px;
}

header .left h1 span{
    color: #1e293b;
}
header .left a {
    display: flex;
    align-items: center;
    background: #031224;
    width: 200px;
    padding: 8px;
    border-radius: 60px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

header .left a:hover {
    transform: scale(1.1); /* Membesarkan tombol saat hover */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Menambahkan bayangan untuk efek pop up */
    ba
}

header .left a:hover span {
    color: #f1f1f1; /* Ubah warna teks */
}

header .left a:hover i {
    background-color: #e3e3e3; /* Ubah warna ikon */
}


header .left p{
    margin: 40px 0;
    color: #666;
}

header .left a{
    display: flex;
    align-items: center;
    background: #031224;
    width: 200px;
    padding: 8px;
    border-radius: 60px;
}

#download-icon {
    color: rgb(25, 25, 25); 
}

header .left a i{
    background-color: #fff;
    font-size: 24px;
    border-radius: 50%;
    padding: 8px;
}

header .left a span{
    color: #fff;
    margin-left: 10px;
}

header img {
    width: 700px;
    position: relative;
  
}

.about{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    background: #f5f5f5;
    padding: 50px;
}

.about > p{
    font-size: 14px;
    color: #606060;
    border: 1px solid #e8e8e8;
    padding: 6px 14px;
    border-radius: 16px;
    margin-bottom: 12px;
    background: #fff;
}

.about > h2{
    font-size: 22px;
    text-align: center;
    margin-bottom: 30px;
}

.about .items{
    display: flex;
    justify-content: center;
    gap: 24px;
}

.about .items .item{
    width: 26%;
    border: 1px solid #e8e8e8;
    border-radius: 16px;
    background: #f1f1f1;
    padding: 0 0 30px;
}

.about .items .item .inner{
    background: #fff;
    padding: 24px;
    border-radius: 16px;
    border: 1px solid #e8e8e8;
    min-height: 365px;
}

.about .items .item .inner img{
    width: 100%;
    margin-bottom: 16px;
    border-radius: 12px;
}

.about .items .item .inner a{
    font-size: 18px;
    color: #000;
    margin-bottom: 10px;
    display: block;
}

.about .items .item .inner p{
    color: #606060;
    font-size: 15px;
}

.projects{
    padding: 0 24px;
    background: #f5f5f5;
    padding-bottom: 60px;
}

.projects .inner{
    background: #031224;
    color: #fff;
    padding: 70px;
    border-radius: 24px;
}

.projects .inner p.debug{
    font-size: 14px;
    margin-bottom: 12px;
    color: #d8d8d8;
    border: 1px solid #484848;
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
}

.projects .inner p.debug i,
.projects .inner > button i{
    font-size: 18px;
}

.projects .inner > h2{
    font-size: 38px;
    margin-bottom: 24px;
}

.projects .inner p.info{
    font-size: 18px;
    color: #dedede;
    margin-bottom: 24px;
}

.projects .inner > button{
    padding: 10px 20px;
    margin-bottom: 40px;
}

.projects .inner .items{
    display: flex;
    gap: 20px;
}

.projects .inner .items .item{
    border: 1px solid #484848;
    border-radius: 16px;
    padding: 32px 24px;
    height: 250px;
    width: 24%;
    background: #1e293b;
}

.projects .inner .items .item i{
    font-size: 38px;
    border: 1px solid #606060;
    border-radius: 10px;
    padding: 10px;
    background: #26344a;
}

.projects .inner .items .item i{
    margin-bottom: 20px;
}

.projects .inner .items .item a{
    display: block;
    margin: 24px 0 14px;
    color: #fff;
    font-size: 20px;
}

.projects .inner .items .item p{
    color: #a1a1a1;
    font-size: 16px;
    line-height: 24px;
}

.projects .inner .items .item:hover {
    background-color: #2d3b50; /* Hover background */
    transform: scale(1.05); /* Hover scale */
    transition: all 0.3s ease;
}

.projects .inner .items .item i:hover {
    color: #0978ff; /* Hover icon color */
}


.services{
    margin-top: 30px;
}

.services .header,
.video-sec .header{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 60px 80px 0;
}

.services .header h3,
.video-sec .header h3{
    color: #031224;
    font-size: 56px;
    text-transform: uppercase;
    width: 60%;
}

.services .service-items{
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 80px;
    padding-bottom: 40px;
}

.services .service-items .item{
    background: #f5f5f5;
    padding: 20px;
    border-radius: 40px;
    width: 25%;
}

.services .service-items .item .title{
    display: flex;
    align-items: center;
    background: #ffffff;
    padding: 5px 20px 5px 5px;
    gap: 10px;
    width: fit-content;
    border-radius: 50px;
    margin-bottom: 30px;
}

.services .service-items .item .title .gradient{
    width: 36px;
    height: 36px;
    border-radius: 50%;
}



.services .service-items .item:nth-child(1) .title .gradient{
    background-image: linear-gradient(to top, #3f51b1 0%, #5a55ae 13%, #7b5fac 25%, #8f6aae 38%, #a86aa4 50%, #cc6b8e 62%, #f18271 75%, #f3a469 87%, #f7c978 100%);
}

.services .service-items .item:nth-child(2) .title .gradient{
    background-image: linear-gradient(to top, #4fb576 0%, #44c489 30%, #28a9ae 46%, #28a2b7 59%, #4c7788 71%, #6c4f63 86%, #432c39 100%);
}

.services .service-items .item:nth-child(3) .title .gradient {
    background-image: linear-gradient(to right, #f83600 0%, #f9d423 100%);
}

.services .service-items .item:nth-child(4) .title .gradient {
    background-image: linear-gradient(to top, #0fd850 0%, #f9f047 100%);
}

.services .service-items .item .desc h5{
    text-transform: uppercase;
    color: #050505;
    font-size: 36px;
    margin-bottom: 10px;
}

.services .service-items .item.active{
    background: #031224;
}

.services .service-items .item.active .title{
    background: #031224;
}

.services .service-items .item.active .desc h5{
    color: #f4f0f0;
}

.services .service-items .item.active .desc p{
    color: #f4f0f0;
}

.showcase{
    padding: 40px 80px;
    margin-top: 60px;
    text-align: center;
}

.text-sec p {
    font-size: 1rem;
    color: #666;
    margin-bottom: 30px;
}
.showcase h3{
    color: #031224;
    font-size: 56px;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 50px;
}

.showcase .text-sec{
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 40px;
    margin-bottom: 20px;
}

.showcase .text-sec p{
    width: 50%;
    text-align: justify;
}

.showcase .text-sec .images,
.showcase .image-sec{
    display: flex;
    align-items: center;
    gap: 20px;
}

.showcase .text-sec .images img,
.showcase .image-sec img{
    width: 256px;
    border-radius: 40px;
    border: 2px solid #c5c5c5;
}

.showcase .images .image-container .name{
    bottom: 10px;
    left: 50%;
    width: 100%;
    padding: 5px;
    text-align: center;
    font-size: 1rem;
    
}

.logo img {
    height: 50px; /* Adjust the height as needed */
    width: auto; /* Maintain aspect ratio */
    object-fit: contain; /* Ensure the image fits well within its container */
}

.item {
    cursor: pointer; /* Makes the box look clickable */
    transition: background-color 0.3s, box-shadow 0.3s;
}

.item:hover {
    background: #e9ecef;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

</style>
<header>
        <div class="left">
            <h1>Let's Begin The <br><span>XABER</span></br></h1>
            <p>Welcome to XABER! The Xaber Ruling System is a strict form of college discipline designed to maintain order and control. The government uses harsh methods, such as strict policies, to enforce rules, which can instill fear among the public. This system has clear and rigid laws that everyone must obey, but these often limit personal freedom. To balance this, it provides assistance or compensation to those affected by its actions. The government also controls essential services such as health services and education to ensure people follow the rules and remain compliant.
            </p>
          
        </div>
        <img src="img/Imagen4.png">
    </header>

    <div class="about">
        <p>About XABRE</p>
        <h2>We provide transparent rules for academic and social conduct.</h2>
        <div class="items">
            <div class="item">
                <div class="inner">
                    <img src="img/services.png">
                    <a href="#">Services System</a>
                    <p>We provide tools for managing activities along with systems to track and improve performance.
                        </p>
                </div>
            </div>
            <div class="item">
                <div class="inner">
                    <img src="img/kompen.png">
                    <a href="#">Compentation System</a>
                    <p>XABRE rewards excellence with leadership roles requiring Students to mentor and work their Alphas.</p>
                </div>
            </div>
            <div class="item">
                <div class="inner">
                    <img src="img/Rules.png">
                    <a href="#">Rules System</a>
                    <p>XABRE establishes clear guidelines for behavior, and collaboration across campus.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="projects">
        <div class="inner">
            <p class="debug"><i class="ri-command-line"></i> Features & Debug</p>
            <h2>System Showcase</h2>
            <p class="info">Take a look at some of our Showcase, showcasing our Agility to Secure and develop
                effective Violence solutions.</p>
                <div class="items">

    <div class="item" data-link="indexMahasiswa.php?page=violance">
        <i class='bx bxs-mask'></i>
        <h3>Violance</h3>
        <p>Violence is presented as a deterrent against lawbreaking and means of maintaining order.</p>
    </div>
    <div class="item" data-link="indexMahasiswa.php">
        <i class='bx bx-brush'></i>
        <h3>Dashboard</h3>
        <p>Offering reparation or benefits to individuals affected by systemic violence or injustice.</p>
    </div>
    <div class="item" data-link="indexMahasiswa.php?page=Rules">
        <i class='bx bx-book-bookmark'></i>
        <h3>Rules</h3>
        <p>Built on an extensive framework of laws designed to regulate nearly every aspect of daily life.</p>
    </div>
    <div class="item" data-link="indexMahasiswa.php?page=Service">
        <i class='bx bx-user-voice'></i>
        <h3>Services</h3>
        <p>To maintain control and stability, the system provides centralized services.</p>
    </div>
</div>

        </div>
    </div>

    <div class="showcase" id="aihub">
    <h3>MEET THE STAKEHOLDER</h3>
    <div class="text-sec">
        <p>
        Lecturers, Admin, and Students. Lecturers guide students, provide feedback while contributing to curriculum management and system improvements. Administrators oversee the system's operations between students and lecturers. Students are the main users, utilizing the system to track their academic progress, engage in activities, take on leadership roles, and offer feedback for ongoing development. Together, these stakeholders create a collaborative, efficient, and supportive learning environment within XABER.
        </p>
        <div class="images">
            <div class="image-container">
                <img src="img/Avatar1.png" alt="Avatar 1">
                <p class="name">Admin</p>
            </div>
            <div class="image-container">
                <img src="img/Avatar2.png" alt="Avatar 2">
                <p class="name">Student</p>
            </div>
            <div class="image-container">
                <img src="img/Avatar3.png" alt="Avatar 3">
                <p class="name">Lecturer</p>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
    document.querySelector('header').classList.add('loaded');
};
// Select all items in the projects section
const items = document.querySelectorAll('.projects .inner .items .item');

// Add event listeners for click events
items.forEach(item => {
    item.addEventListener('click', () => {
        item.classList.add('hover');

        setTimeout(() => {
            item.classList.remove('hover');
        }, 300);
    });
});

document.querySelectorAll('.item').forEach(item => {
    item.addEventListener('click', function () {
        const link = this.getAttribute('data-link');
        window.location.href = link;
    });
});

</script>
