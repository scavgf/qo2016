USE EVCSF_INT
USE MXYTF_INT
USE WRCRN_INT
USE WRRRN_INT
USE EVCRG_INT
IMPLICIT NONE
real(8),parameter:: xi=0.05d0
real(8),parameter:: g=0.02d0
real(8),parameter:: omega0=1.0d0
real(8),parameter:: omegac=1.0
real(8),PARAMETER :: pi =4.d0*atan(1.d0)
real(8):: DELTA
REAL t,t1,t2
complex(8) ,parameter :: e=(0.0,1.0) !定义虚部
INTEGER i,n
PARAMETER (N=201)
complex(8) PHASE1(N,N),PHASE(N,N),RESUL(N),EVEC(N,N),C(N,N),STAT(N)
real(8) A(N,N) ,EVAL(N),EVEC2(N,N)
real omegak
character(5)::name1
do delta=0.0,-0.60,-0.01D0
!     write(name1,'(f5.2)') delta
!    open (1,file='abs'//trim(adjustl(name1))//'.dat')
!     open (2,file="rel"//trim(adjustl(name1))//".dat")
!     open (3,file="ima"//trim(adjustl(name1))//".dat")
      open(1,file="an/rel.dat")
      open(2,file="an/imag.dat")
     print*,"coulpling strength g =",g,DELTA
call cpu_time(t1)
!initialization:
STAT=0.0;
STAT(1)=1.0;
PHASE1=0;phase=0;
RESUL=0.0;
A=0;c=0.0;
A(1,1)=omega0+delta;
do i=2,n
  omegak=omegac-2.0*xi*cos((i-1)*2*pi/(n-1.0)-pi);
  A(i,i)=omegak
  A(1,i)=g/sqrt(n-1.0)
  A(i,1)=A(1,i)
end do
!Find eigenvalues and vectors of A
 CALL EVCSF (A, EVAL, EVEC2)
 EVEC=EVEC2
! print*,EVAL
 do t=0.0,1500.0,0.2
 DO I=1,N
    PHASE1(I,I)=EXP(-E*EVAL(I)*t)
 END DO
    CALL ZGEMM ('N', 'C', N, N, N, 1.d0, PHASE1, N,EVEC, N, 0.0,C, N)
    CALL ZGEMM ('N', 'N', N, N, N, 1.d0, EVEC, N, C, N, 0.0, PHASE, N)
    CALL ZGEMV ('N', N, N, 1.d0, PHASE, N,STAT, 1, 0.0,RESUL,1) 
    resul=matmul(phase,stat)
!    write(1,*) t, abs(resul(1))**2.0
    write(1,*) omega0+delta,t, real(resul(1))
    write(2,*) omega0+delta,t, aimag(resul(1))
    print*, t
end do         
 call cpu_time(t2)
print*,"The cost time is", t2-t1,delta
END DO
end
