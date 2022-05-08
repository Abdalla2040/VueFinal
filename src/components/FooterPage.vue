<template>
    <footer class="footer">
        <h3 class="contact">Contact Information</h3>
        <ul class="list">
            <li>Phone: 320-124-5225</li>
            <li>Email: tb2332wz@go.minnstate.edu</li>
            <li>Address: 123 Maine St, St. Cloud MN 56301</li>
        </ul>
    </footer>
</template>

<script>
export default {
    name: 'footerPage'
}
</script>


<style scoped>
    /* body{
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    } */
    .footer{
       /* border: 0.1rem dashed black; */
       display: block;
        background: rgb(195, 78, 78);
        color: white;
        margin: 0;
        padding: 0;
        height: 100%;

    }
    .contact{
        display: block;
        margin: 0;
        padding-top: 1rem;

    }
    .list{
        
        padding: 1rem;
        display: flex;
        align-items: center;
        flex-direction: column ;
        /* margin-right: 10rem; */
    }
    .list{
        list-style: none;

    }
    .list ul li{
        text-decoration: none;
        border: 0.2rem solid blue;
    }

</style>