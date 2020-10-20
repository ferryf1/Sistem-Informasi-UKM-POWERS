var majors = {
	AK:['D3 Akuntansi','D4 Akuntansi Sektor Publik'],
	AB:['D3 Administrasi Bisnis','D4 Administrasi Negara','D4 Administrasi Bisnis Otomotif'],
	IKP:['D3 Pengolahan Hasil Perikanan','D3 Teknologi Penangkapan Ikan','D3 Teknologi Budidaya Perikanan'],
	TA:['D3 Arsitektur','D4 Arsitektur Bangunan Gedung','D4 Desain Kawasan Binaan'],
	TE:['D3 Teknik Elektronika','D3 Teknik Informatika','D3 Teknik Listrik'],
	TM:['D1 Operator & Peralatan Alat Berat','D3 Teknik Mesin','D4 Teknik Mesin'],
	TP:['D3 Teknologi Pengolahan Hasil Perkebunan','D4 Manajemen Perkebunan','D4 Budidaya Tanaman Perkebunan'],
	TS:['D3 Teknik Sipil','D4 Perencanaan Perumahan Dan Pemukiman']

}

// Getting the main and sub menu
var main = document.getElementById('main_menu');
var sub = document.getElementById('sub_menu');

// Trigger the Event when main menu change occurs
main.addEventListener('change',function(){

	// Getting a selected option
	var selected_option = majors[this.value];

	//removing the sub menu options using while loop
	while(sub.options.length > 0){
		sub.options.remove(0);
	}

	//conver the selected objects into array and create an options for each array elements
	//using Option constructopr it will create html element with the given value and InnerText

	Array.from(selected_option).forEach(function(el){
		let option = new Option(el,el);

		//append the child option in sub menu
		sub.appendChild(option);
	});
});