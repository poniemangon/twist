const token = 'IGAAQIyZCL8Cp1BZAE9UYlNWQVFua1FOMW1SMzJ4b19GdlQzTFlobXZAOX19BY0dGRTdzNlpKNTg5S0hubzh0ZAEtRelNUSklVZAThYZAms5blRRa2o3VFVMcWdmSVQwdTlTajZAUaVRkVV9UaEg3ZAUF2QzlZAZAUhR';

fetch(`https://graph.instagram.com/me/media?fields=id,media_type,media_url,permalink,caption,thumbnail_url&access_token=${token}`).then(res => res.json()).then(data => {
        const container = document.getElementById('instafeed');
        const quantity = 8;

        data.data.slice(0, quantity).forEach(post => {
        const imageSrc = post.thumbnail_url ?? post.media_url;

        if (post.media_type === 'IMAGE' || post.media_type === 'CAROUSEL_ALBUM' || post.media_type === 'VIDEO') {
            container.innerHTML += `<div class="img-feed">
                <a href="${post.permalink}" target="_blank">
                    <img src="${imageSrc}" alt="${post.caption ?? ''}" class="img-fluid" loading="lazy">
                </a>
            </div>`;
        }
    });
});