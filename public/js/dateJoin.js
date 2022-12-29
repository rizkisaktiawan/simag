let date_join = document.getElementById('date_join')

      date_join.addEventListener('change',(e)=>{
        let date_joinVal = e.target.value
        document.getElementById('date_joinSelected').innerText = date_joinVal
      })